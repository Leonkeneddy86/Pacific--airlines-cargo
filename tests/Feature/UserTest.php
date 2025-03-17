<?php
namespace Tests\Feature;

use App\Models\Flight;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use ReflectionClass;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testFillableFields()
    {
        $user = new User();
        $this->assertSame(
            ['name', 'email', 'password', 'admin'],
            $user->getFillable()
        );
    }

    public function testHiddenFields()
    {
        $user = new User();
        $this->assertSame(
            ['password', 'remember_token'],
            $user->getHidden()
        );
    }

    public function testCasts()
    {
        $user = new User();
        $expected = [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];

        $reflection = new ReflectionClass($user);
        $method = $reflection->getMethod('casts');
        $method->setAccessible(true);
        $casts = $method->invoke($user);

        $this->assertSame($expected, $casts);
    }

    public function testGetJWTIdentifier()
    {
        $user = new User();
        // Manually assign an ID.
        $user->id = 1;
        $this->assertSame(1, $user->getJWTIdentifier());
    }

    public function testGetJWTCustomClaims()
    {
        $user = new User();
        $this->assertSame([], $user->getJWTCustomClaims());
    }

    public function testFlightsRelationship()
    {
        $user = new User();
        $relation = $user->flights();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertSame('flight_user', $relation->getTable());
        $this->assertSame(Flight::class, get_class($relation->getRelated()));
    }
}