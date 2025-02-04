<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Planes;

class PlanesTest extends TestCase
{
    public function test_fillable_attributes()
    {
        $plane = new Planes();
        $this->assertEquals(['name', 'places'], $plane->getFillable());
    }

    public function test_plane_creation()
    {
        $plane = new Planes([
            'name' => 'Boeing 747',
            'places' => 416
        ]);
        $this->assertEquals('Boeing 747', $plane->name);
        $this->assertEquals(416, $plane->places);
    }
}