<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\Models\Admin;


class AdminTest extends TestCase
{
    /**
     * Test that the Admin model has the expected fillable attributes.
     *
     * @return void
     */
    public function test_admin_model_has_expected_fillable_fields()
    {
        $admin = new Admin;
        $expected = [
            'name',
            'email',
            'password',
            'admin',
        ];

        $this->assertEquals($expected, $admin->getFillable());
    }
}