<?php

declare(strict_types=1);

use App\Models\Dealership;

use function Pest\Laravel\get;

it('can see the dealership index when logged in', function () {
    $response = asAdmin()
        ->get(route('dealership.index'));

    $response->assertOk();
});

it('can see the dealership index when logged out', function () {
    $response = get(route('dealership.index'));

    $response->assertRedirect(route('login'));
});

it('can see dealerships', function () {
    $dealership = Dealership::factory()->create();

    $response = asAdmin()
        ->get(route('dealership.index'));

    $response->assertSee($dealership->name);
});
