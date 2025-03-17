<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Flight;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class flightTest extends TestCase
{
    /**
     * Test the planes relationship returns a BelongsTo instance.
     *
     * @return void
     */
    public function testPlanesRelationshipReturnsBelongsTo()
    {
        $flight = new Flight();
        $relation = $flight->planes();
        $this->assertInstanceOf(BelongsTo::class, $relation);
    }

    /**
     * Test the users relationship returns a BelongsToMany instance.
     *
     * @return void
     */
    public function testUsersRelationshipReturnsBelongsToMany()
    {
        $flight = new Flight();
        $relation = $flight->users();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
    }
}