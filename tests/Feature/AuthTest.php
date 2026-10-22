<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_is_shown(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Login BI Kantin');
    }

    public function test_admin_logs_in_to_admin_dashboard(): void
    {
        User::factory()->admin()->create(['username' => 'admin_kantin', 'password' => 'admin123']);

        $this->post(route('login.store'), ['username' => 'admin_kantin', 'password' => 'admin123'])
            ->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticated();
    }

    public function test_siswa_logs_in_to_siswa_dashboard(): void
    {
        User::factory()->create(['username' => 'budi_siswa', 'password' => '123']);

        $this->post(route('login.store'), ['username' => 'budi_siswa', 'password' => '123'])
            ->assertRedirect(route('siswa.dashboard'));

        $this->assertAuthenticated();
    }

    public function test_wrong_password_is_rejected(): void
    {
        User::factory()->create(['username' => 'budi_siswa', 'password' => '123']);

        $this->from(route('login'))
            ->post(route('login.store'), ['username' => 'budi_siswa', 'password' => 'salah'])
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('username');

        $this->assertGuest();
    }

    public function test_user_can_log_out(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }

    public function test_guests_cannot_open_dashboards(): void
    {
        $this->get(route('admin.dashboard'))->assertRedirect(route('login'));
        $this->get(route('siswa.dashboard'))->assertRedirect(route('login'));
    }

    public function test_roles_cannot_open_each_others_dashboard(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('admin.dashboard'))
            ->assertForbidden();

        $this->actingAs(User::factory()->admin()->create())
            ->get(route('siswa.dashboard'))
            ->assertForbidden();
    }
}
