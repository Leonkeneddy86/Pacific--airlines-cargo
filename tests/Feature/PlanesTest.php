<?php

namespace Tests\Feature;

use App\Models\Planes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class PlanesTest extends TestCase
{
    /**
     * Test the fillable attributes.
     *
     * @return void
     */
    public function testFillableAttributes()
    {
        $expectedFillable = ['name', 'places'];
        $plane = new Planes;

        $this->assertSame($expectedFillable, $plane->getFillable());
    }

    /**
     * Test the flights relationship.
     *
     * @return void
     */
    public function testFlightsRelationship()
    {
        $plane = new Planes;
        $relation = $plane->flights();

        $this->assertInstanceOf(HasMany::class, $relation);
    }
}