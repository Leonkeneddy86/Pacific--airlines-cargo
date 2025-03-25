<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\Http\Controllers\AdminController;


class AdminControllerTest extends TestCase
{
    /**
     * Test that the index method returns the "Error" view with the correct data.
     *
     * @return void
     */
    public function test_index_returns_error_view_with_admin_data()
    {
        // Call the AdminController index method
        $response = $this->get(action([AdminController::class, 'index']));

        $response->assertStatus(200);
        $response->assertViewIs('Error');
        $response->assertViewHas('admin', 'admin');
    }
}