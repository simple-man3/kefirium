<?php

use App\Domain\Users\Models\User;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\getJson;
use function Pest\Laravel\postJson;

uses()->group('users', 'component');

test('POST /api/v1/user create user 201', function () {
    $user = User::factory()->makeOne();

    $request = $user->only([
        'login',
        'email',
        'password',
    ]);
    $request['password_confirmation'] = $request['password'];

    postJson('/api/v1/user', $request)
        ->assertCreated();

    unset($request['password_confirmation']);

    assertDatabaseHas($user->getTable(), $request);
});

test('POST /api/v1/user 400 empty request', function () {
    postJson('/api/v1/user')
        ->assertBadRequest();
});

test('POST /api/v1/user 400 with same email', function () {
    $user = User::factory()
        ->createOne();

    $request = User::factory()
        ->withEmail($user->email)
        ->makeOne()
        ->only([
            'login',
            'email',
            'password',
        ]);

    postJson('/api/v1/user', $request)
        ->assertBadRequest();
});

test('POST /api/v1/user 400 with same login', function () {
    $user = User::factory()
        ->createOne();

    $request = User::factory()
        ->withEmail($user->login)
        ->makeOne()
        ->only([
            'login',
            'email',
            'password',
        ]);

    postJson('/api/v1/user', $request)
        ->assertBadRequest();
});

test('POST /api/v1/user/{id} 200', function () {
    $user = User::factory()->createOne();

    getJson("/api/v1/user/{$user->id}")
        ->assertOk()
        ->assertJsonPath('data.id', $user->id);
});

test('POST /api/v1/user/{id} 404 wrong id', function () {
    $user = User::factory()->createOne();

    $wrongId = ++$user->id;

    getJson("/api/v1/user/{$wrongId}")
        ->assertNotFound();
});
