<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\TransaksiPetani;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TransaksiPetaniControllerTest extends TestCase
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
    public function it_displays_index_view_with_transaksi_petanis()
    {
        $transaksiPetanis = TransaksiPetani::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('transaksi-petanis.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.transaksi_petanis.index')
            ->assertViewHas('transaksiPetanis');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_transaksi_petani()
    {
        $response = $this->get(route('transaksi-petanis.create'));

        $response->assertOk()->assertViewIs('app.transaksi_petanis.create');
    }

    /**
     * @test
     */
    public function it_stores_the_transaksi_petani()
    {
        $data = TransaksiPetani::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('transaksi-petanis.store'), $data);

        unset($data['user_id']);

        $this->assertDatabaseHas('transaksi_petanis', $data);

        $transaksiPetani = TransaksiPetani::latest('id')->first();

        $response->assertRedirect(
            route('transaksi-petanis.edit', $transaksiPetani)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_transaksi_petani()
    {
        $transaksiPetani = TransaksiPetani::factory()->create();

        $response = $this->get(
            route('transaksi-petanis.show', $transaksiPetani)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.transaksi_petanis.show')
            ->assertViewHas('transaksiPetani');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_transaksi_petani()
    {
        $transaksiPetani = TransaksiPetani::factory()->create();

        $response = $this->get(
            route('transaksi-petanis.edit', $transaksiPetani)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.transaksi_petanis.edit')
            ->assertViewHas('transaksiPetani');
    }

    /**
     * @test
     */
    public function it_updates_the_transaksi_petani()
    {
        $transaksiPetani = TransaksiPetani::factory()->create();

        $user = User::factory()->create();

        $data = [
            'total' => $this->faker->text(7),
            'user_id' => $user->id,
        ];

        $response = $this->put(
            route('transaksi-petanis.update', $transaksiPetani),
            $data
        );

        unset($data['user_id']);

        $data['id'] = $transaksiPetani->id;

        $this->assertDatabaseHas('transaksi_petanis', $data);

        $response->assertRedirect(
            route('transaksi-petanis.edit', $transaksiPetani)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_transaksi_petani()
    {
        $transaksiPetani = TransaksiPetani::factory()->create();

        $response = $this->delete(
            route('transaksi-petanis.destroy', $transaksiPetani)
        );

        $response->assertRedirect(route('transaksi-petanis.index'));

        $this->assertDeleted($transaksiPetani);
    }
}
