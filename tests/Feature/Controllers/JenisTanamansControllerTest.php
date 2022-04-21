<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\JenisTanamans;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JenisTanamansControllerTest extends TestCase
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
    public function it_displays_index_view_with_all_jenis_tanamans()
    {
        $allJenisTanamans = JenisTanamans::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('all-jenis-tanamans.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.all_jenis_tanamans.index')
            ->assertViewHas('allJenisTanamans');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_jenis_tanamans()
    {
        $response = $this->get(route('all-jenis-tanamans.create'));

        $response->assertOk()->assertViewIs('app.all_jenis_tanamans.create');
    }

    /**
     * @test
     */
    public function it_stores_the_jenis_tanamans()
    {
        $data = JenisTanamans::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('all-jenis-tanamans.store'), $data);

        $this->assertDatabaseHas('jenis_tanamans', $data);

        $jenisTanamans = JenisTanamans::latest('id')->first();

        $response->assertRedirect(
            route('all-jenis-tanamans.edit', $jenisTanamans)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_jenis_tanamans()
    {
        $jenisTanamans = JenisTanamans::factory()->create();

        $response = $this->get(
            route('all-jenis-tanamans.show', $jenisTanamans)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_jenis_tanamans.show')
            ->assertViewHas('jenisTanamans');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_jenis_tanamans()
    {
        $jenisTanamans = JenisTanamans::factory()->create();

        $response = $this->get(
            route('all-jenis-tanamans.edit', $jenisTanamans)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.all_jenis_tanamans.edit')
            ->assertViewHas('jenisTanamans');
    }

    /**
     * @test
     */
    public function it_updates_the_jenis_tanamans()
    {
        $jenisTanamans = JenisTanamans::factory()->create();

        $data = [
            'nama' => $this->faker->text(50),
        ];

        $response = $this->put(
            route('all-jenis-tanamans.update', $jenisTanamans),
            $data
        );

        $data['id'] = $jenisTanamans->id;

        $this->assertDatabaseHas('jenis_tanamans', $data);

        $response->assertRedirect(
            route('all-jenis-tanamans.edit', $jenisTanamans)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_jenis_tanamans()
    {
        $jenisTanamans = JenisTanamans::factory()->create();

        $response = $this->delete(
            route('all-jenis-tanamans.destroy', $jenisTanamans)
        );

        $response->assertRedirect(route('all-jenis-tanamans.index'));

        $this->assertDeleted($jenisTanamans);
    }
}
