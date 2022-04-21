<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Transaksi;

use App\Models\Barang;
use App\Models\DetailTransaksi;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransaksiControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_transaksis()
    {
        $transaksis = Transaksi::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('transaksis.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.transaksis.index')
            ->assertViewHas('transaksis');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_transaksi()
    {
        $response = $this->get(route('transaksis.create'));

        $response->assertOk()->assertViewIs('app.transaksis.create');
    }

    /**
     * @test
     */
    public function it_stores_the_transaksi()
    {
        $data = Transaksi::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('transaksis.store'), $data);

        unset($data['user_id']);

        $this->assertDatabaseHas('transaksis', $data);

        $transaksi = Transaksi::latest('id')->first();

        $response->assertRedirect(route('transaksis.edit', $transaksi));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_transaksi()
    {
        $transaksi = Transaksi::factory()->create();

        $response = $this->get(route('transaksis.show', $transaksi));

        $response
            ->assertOk()
            ->assertViewIs('app.transaksis.show')
            ->assertViewHas('transaksi');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_transaksi()
    {
        $transaksi = Transaksi::factory()->create();

        $response = $this->get(route('transaksis.edit', $transaksi));

        $response
            ->assertOk()
            ->assertViewIs('app.transaksis.edit')
            ->assertViewHas('transaksi');
    }

    /**
     * @test
     */
    public function it_updates_the_transaksi()
    {
        $transaksi = Transaksi::factory()->create();

        $barang = Barang::factory()->create();
        $detailTransaksi = DetailTransaksi::factory()->create();
        $user = User::factory()->create();

        $data = [
            'stok' => $this->faker->text(3),
            'harga' => $this->faker->text(7),
            'barang_id' => $barang->id,
            'detail_transaksi_id' => $detailTransaksi->id,
            'user_id' => $user->id,
        ];

        $response = $this->put(route('transaksis.update', $transaksi), $data);

        unset($data['user_id']);

        $data['id'] = $transaksi->id;

        $this->assertDatabaseHas('transaksis', $data);

        $response->assertRedirect(route('transaksis.edit', $transaksi));
    }

    /**
     * @test
     */
    public function it_deletes_the_transaksi()
    {
        $transaksi = Transaksi::factory()->create();

        $response = $this->delete(route('transaksis.destroy', $transaksi));

        $response->assertRedirect(route('transaksis.index'));

        $this->assertDeleted($transaksi);
    }
}
