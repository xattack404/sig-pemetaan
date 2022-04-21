<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\DetailTransaksi;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DetailTransaksiControllerTest extends TestCase
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
    public function it_displays_index_view_with_detail_transaksis()
    {
        $detailTransaksis = DetailTransaksi::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('detail-transaksis.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.detail_transaksis.index')
            ->assertViewHas('detailTransaksis');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_detail_transaksi()
    {
        $response = $this->get(route('detail-transaksis.create'));

        $response->assertOk()->assertViewIs('app.detail_transaksis.create');
    }

    /**
     * @test
     */
    public function it_stores_the_detail_transaksi()
    {
        $data = DetailTransaksi::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('detail-transaksis.store'), $data);

        unset($data['user_id']);

        $this->assertDatabaseHas('detail_transaksis', $data);

        $detailTransaksi = DetailTransaksi::latest('id')->first();

        $response->assertRedirect(
            route('detail-transaksis.edit', $detailTransaksi)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_detail_transaksi()
    {
        $detailTransaksi = DetailTransaksi::factory()->create();

        $response = $this->get(
            route('detail-transaksis.show', $detailTransaksi)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.detail_transaksis.show')
            ->assertViewHas('detailTransaksi');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_detail_transaksi()
    {
        $detailTransaksi = DetailTransaksi::factory()->create();

        $response = $this->get(
            route('detail-transaksis.edit', $detailTransaksi)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.detail_transaksis.edit')
            ->assertViewHas('detailTransaksi');
    }

    /**
     * @test
     */
    public function it_updates_the_detail_transaksi()
    {
        $detailTransaksi = DetailTransaksi::factory()->create();

        $user = User::factory()->create();

        $data = [
            'total' => $this->faker->text(7),
            'user_id' => $user->id,
        ];

        $response = $this->put(
            route('detail-transaksis.update', $detailTransaksi),
            $data
        );

        unset($data['user_id']);

        $data['id'] = $detailTransaksi->id;

        $this->assertDatabaseHas('detail_transaksis', $data);

        $response->assertRedirect(
            route('detail-transaksis.edit', $detailTransaksi)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_detail_transaksi()
    {
        $detailTransaksi = DetailTransaksi::factory()->create();

        $response = $this->delete(
            route('detail-transaksis.destroy', $detailTransaksi)
        );

        $response->assertRedirect(route('detail-transaksis.index'));

        $this->assertDeleted($detailTransaksi);
    }
}
