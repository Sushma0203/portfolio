<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_dashboard_displays_clickable_cards()
    {
        // Create a user and assign admin role (adjust as per your application)
        $admin = User::factory()->create();
        // Assuming there is an is_admin attribute or similar; adjust if needed
        $admin->is_admin = true;
        $admin->save();

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));
        $response->assertStatus(200);
        // Check for the presence of the three anchor links
        $response->assertSee('href="' . route('admin.gallery.index') . '"', false);
        $response->assertSee('href="' . route('admin.projects.index') . '"', false);
        $response->assertSee('href="' . route('admin.messages.index') . '"', false);
    }
}
