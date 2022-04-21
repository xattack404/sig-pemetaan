<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Lahan;

use App\Models\JenisTanamans;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LahanControllerTest extends TestCase
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
    public function it_displays_index_view_with_lahans()
    {
        $lahans = Lahan::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('lahans.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.lahans.index')
            ->assertViewHas('lahans');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_lahan()
    {
        $response = $this->get(route('lahans.create'));

        $response->assertOk()->assertViewIs('app.lahans.create');
    }

    /**
     * @test
     */
    public function it_stores_the_lahan()
    {
        $data = Lahan::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('lahans.store'), $data);

        $this->assertDatabaseHas('lahans', $data);

        $lahan = Lahan::latest('id')->first();

        $response->assertRedirect(route('lahans.edit', $lahan));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_lahan()
    {
        $lahan = Lahan::factory()->create();

        $response = $this->get(route('lahans.show', $lahan));

        $response
            ->assertOk()
            ->assertViewIs('app.lahans.show')
            ->assertViewHas('lahan');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_lahan()
    {
        $lahan = Lahan::factory()->create();

        $response = $this->get(route('lahans.edit', $lahan));

        $response
            ->assertOk()
            ->assertViewIs('app.lahans.edit')
            ->assertViewHas('lahan');
    }

    /**
     * @test
     */
    public function it_updates_the_lahan()
    {
        $lahan = Lahan::factory()->create();

        $jenisTanamans = JenisTanamans::factory()->create();

        $data = [
            'nama' => $this->faker->text(50),
            'status_panen' => 'Proses Tanam',
            'lattitude' => $this->faker->text(15),
            'longitude' => $this->faker->text(15),
            'jenis_tanamans_id' => $jenisTanamans->id,
        ];

        $response = $this->put(route('lahans.update', $lahan), $data);

        $data['id'] = $lahan->id;

        $this->assertDatabaseHas('lahans', $data);

        $response->assertRedirect(route('lahans.edit', $lahan));
    }

    /**
     * @test
     */
    public function it_deletes_the_lahan()
    {
        $lahan = Lahan::factory()->create();

        $response = $this->delete(route('lahans.destroy', $lahan));

        $response->assertRedirect(route('lahans.index'));

        $this->assertDeleted($lahan);
    }
}
