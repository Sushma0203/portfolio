<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Admin;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;


    public function test_guest_is_redirected_to_login()
    {
        $response = $this->get('/admin/dashboard');

        $response->assertStatus(302);
        $response->assertRedirect(route('auth.login'));
    }

    public function test_authenticated_admin_can_access_dashboard()
    {
        // Simulate logged in admin by setting session
        $response = $this->withSession(['admin_username' => 'test_admin'])
                         ->get('/admin/dashboard');

        $response->assertStatus(200);
    }
}
