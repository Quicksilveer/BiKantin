<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class RoleMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Route::middleware(['web', 'auth', 'role:admin'])->get('/_test/admin-only', fn () => 'ok');
        Route::middleware(['web', 'auth', 'role:admin,siswa'])->get('/_test/semua-role', fn () => 'ok');
    }

    public function test_matching_role_is_allowed(): void
    {
        $this->actingAs(User::factory()->admin()->create())
            ->get('/_test/admin-only')
            ->assertOk();
    }

    public function test_other_role_is_forbidden(): void
    {
        $this->actingAs(User::factory()->create())
            ->get('/_test/admin-only')
            ->assertForbidden();
    }

    public function test_several_roles_can_share_a_route(): void
    {
        $this->actingAs(User::factory()->admin()->create())->get('/_test/semua-role')->assertOk();
        $this->actingAs(User::factory()->create())->get('/_test/semua-role')->assertOk();
    }
}
