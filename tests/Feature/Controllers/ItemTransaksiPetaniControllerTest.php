<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ItemTransaksiPetani;

use App\Models\Panen;
use App\Models\TransaksiPetani;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTransaksiPetaniControllerTest extends TestCase
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
    public function it_displays_index_view_with_item_transaksi_petanis()
    {
        $itemTransaksiPetanis = ItemTransaksiPetani::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('item-transaksi-petanis.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.item_transaksi_petanis.index')
            ->assertViewHas('itemTransaksiPetanis');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_item_transaksi_petani()
    {
        $response = $this->get(route('item-transaksi-petanis.create'));

        $response
            ->assertOk()
            ->assertViewIs('app.item_transaksi_petanis.create');
    }

    /**
     * @test
     */
    public function it_stores_the_item_transaksi_petani()
    {
        $data = ItemTransaksiPetani::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('item-transaksi-petanis.store'), $data);

        unset($data['user_id']);

        $this->assertDatabaseHas('item_transaksi_petanis', $data);

        $itemTransaksiPetani = ItemTransaksiPetani::latest('id')->first();

        $response->assertRedirect(
            route('item-transaksi-petanis.edit', $itemTransaksiPetani)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_item_transaksi_petani()
    {
        $itemTransaksiPetani = ItemTransaksiPetani::factory()->create();

        $response = $this->get(
            route('item-transaksi-petanis.show', $itemTransaksiPetani)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.item_transaksi_petanis.show')
            ->assertViewHas('itemTransaksiPetani');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_item_transaksi_petani()
    {
        $itemTransaksiPetani = ItemTransaksiPetani::factory()->create();

        $response = $this->get(
            route('item-transaksi-petanis.edit', $itemTransaksiPetani)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.item_transaksi_petanis.edit')
            ->assertViewHas('itemTransaksiPetani');
    }

    /**
     * @test
     */
    public function it_updates_the_item_transaksi_petani()
    {
        $itemTransaksiPetani = ItemTransaksiPetani::factory()->create();

        $panen = Panen::factory()->create();
        $transaksiPetani = TransaksiPetani::factory()->create();
        $user = User::factory()->create();

        $data = [
            'stok' => $this->faker->text(3),
            'harga' => $this->faker->text(7),
            'panen_id' => $panen->id,
            'transaksi_petani_id' => $transaksiPetani->id,
            'user_id' => $user->id,
        ];

        $response = $this->put(
            route('item-transaksi-petanis.update', $itemTransaksiPetani),
            $data
        );

        unset($data['user_id']);

        $data['id'] = $itemTransaksiPetani->id;

        $this->assertDatabaseHas('item_transaksi_petanis', $data);

        $response->assertRedirect(
            route('item-transaksi-petanis.edit', $itemTransaksiPetani)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_item_transaksi_petani()
    {
        $itemTransaksiPetani = ItemTransaksiPetani::factory()->create();

        $response = $this->delete(
            route('item-transaksi-petanis.destroy', $itemTransaksiPetani)
        );

        $response->assertRedirect(route('item-transaksi-petanis.index'));

        $this->assertDeleted($itemTransaksiPetani);
    }
}
