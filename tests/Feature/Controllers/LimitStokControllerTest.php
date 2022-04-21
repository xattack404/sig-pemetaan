<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\LimitStok;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LimitStokControllerTest extends TestCase
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
    public function it_displays_index_view_with_limit_stoks()
    {
        $limitStoks = LimitStok::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('limit-stoks.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.limit_stoks.index')
            ->assertViewHas('limitStoks');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_limit_stok()
    {
        $response = $this->get(route('limit-stoks.create'));

        $response->assertOk()->assertViewIs('app.limit_stoks.create');
    }

    /**
     * @test
     */
    public function it_stores_the_limit_stok()
    {
        $data = LimitStok::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('limit-stoks.store'), $data);

        $this->assertDatabaseHas('limit_stoks', $data);

        $limitStok = LimitStok::latest('id')->first();

        $response->assertRedirect(route('limit-stoks.edit', $limitStok));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_limit_stok()
    {
        $limitStok = LimitStok::factory()->create();

        $response = $this->get(route('limit-stoks.show', $limitStok));

        $response
            ->assertOk()
            ->assertViewIs('app.limit_stoks.show')
            ->assertViewHas('limitStok');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_limit_stok()
    {
        $limitStok = LimitStok::factory()->create();

        $response = $this->get(route('limit-stoks.edit', $limitStok));

        $response
            ->assertOk()
            ->assertViewIs('app.limit_stoks.edit')
            ->assertViewHas('limitStok');
    }

    /**
     * @test
     */
    public function it_updates_the_limit_stok()
    {
        $limitStok = LimitStok::factory()->create();

        $data = [
            'limit' => $this->faker->text(3),
        ];

        $response = $this->put(route('limit-stoks.update', $limitStok), $data);

        $data['id'] = $limitStok->id;

        $this->assertDatabaseHas('limit_stoks', $data);

        $response->assertRedirect(route('limit-stoks.edit', $limitStok));
    }

    /**
     * @test
     */
    public function it_deletes_the_limit_stok()
    {
        $limitStok = LimitStok::factory()->create();

        $response = $this->delete(route('limit-stoks.destroy', $limitStok));

        $response->assertRedirect(route('limit-stoks.index'));

        $this->assertDeleted($limitStok);
    }
}
