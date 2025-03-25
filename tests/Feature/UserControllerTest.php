<?php

namespace Tests\Feature;

use Tests\TestCase;


class UserControllerTest extends TestCase
{
    /**
     * Test the index method of the UserController.
     *
     * Assumes a route exists which maps to the index() method.
     */
    public function test_index_returns_index_view()
    {
        
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('index');
    }
}