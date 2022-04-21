<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Panen;

use App\Models\Lahan;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PanenControllerTest extends TestCase
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
    public function it_displays_index_view_with_panens()
    {
        $panens = Panen::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('panens.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.panens.index')
            ->assertViewHas('panens');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_panen()
    {
        $response = $this->get(route('panens.create'));

        $response->assertOk()->assertViewIs('app.panens.create');
    }

    /**
     * @test
     */
    public function it_stores_the_panen()
    {
        $data = Panen::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('panens.store'), $data);

        $this->assertDatabaseHas('panens', $data);

        $panen = Panen::latest('id')->first();

        $response->assertRedirect(route('panens.edit', $panen));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_panen()
    {
        $panen = Panen::factory()->create();

        $response = $this->get(route('panens.show', $panen));

        $response
            ->assertOk()
            ->assertViewIs('app.panens.show')
            ->assertViewHas('panen');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_panen()
    {
        $panen = Panen::factory()->create();

        $response = $this->get(route('panens.edit', $panen));

        $response
            ->assertOk()
            ->assertViewIs('app.panens.edit')
            ->assertViewHas('panen');
    }

    /**
     * @test
     */
    public function it_updates_the_panen()
    {
        $panen = Panen::factory()->create();

        $lahan = Lahan::factory()->create();

        $data = [
            'stok' => $this->faker->text(3),
            'harga' => $this->faker->text(7),
            'lahan_id' => $lahan->id,
        ];

        $response = $this->put(route('panens.update', $panen), $data);

        $data['id'] = $panen->id;

        $this->assertDatabaseHas('panens', $data);

        $response->assertRedirect(route('panens.edit', $panen));
    }

    /**
     * @test
     */
    public function it_deletes_the_panen()
    {
        $panen = Panen::factory()->create();

        $response = $this->delete(route('panens.destroy', $panen));

        $response->assertRedirect(route('panens.index'));

        $this->assertDeleted($panen);
    }
}
