<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Illuminate\Support\Facades\Hash;
use function Pest\Faker\faker;

uses(RefreshDatabase::class);

it("changes account's name", function () {
    // create new user
    $account = User::factory()->create();
    $new_name = faker()->name;

    // update his name
    Livewire::test('account-preferences-edit', ['account' => $account])
        ->set('user.name', $new_name)
        ->call('save')
        ->assertEmitted('swal:toast');

    // assert new name
    $actual_name = User::find($account->id)->name;
    $this->assertEquals($new_name, $actual_name);
});

it("changes account's email", function () {
    // create new user
    $account = User::factory()->create();
    $new_email = faker()->email;

    // update his email
    Livewire::test('account-preferences-edit', ['account' => $account])
        ->set('user.email', $new_email)
        ->call('save')
        ->assertEmitted('swal:toast');

    // assert new email
    $actual_email = User::find($account->id)->email;
    $this->assertEquals($new_email, $actual_email);
});

it("doesn't change account's name if email is missing", function () {
    // create new user
    $account = User::factory()->create();
    $new_name = faker()->name;

    // update his name and set name to null
    Livewire::test('account-preferences-edit', ['account' => $account])
        ->set('user.name', $new_name)
        ->set('user.email', null)
        ->call('save')
        ->assertHasErrors(['user.email'])
        ->assertEmitted('swal:toast');

    // assert new name
    $actual_name = User::find($account->id)->name;
    $this->assertNotEquals($new_name, $actual_name);
});

it("doesn't change account's email if name is missing", function () {
    // create new user
    $account = User::factory()->create();
    $new_email = faker()->email;

    // update his email and set name to null
    Livewire::test('account-preferences-edit', ['account' => $account])
        ->set('user.name', null)
        ->set('user.email', $new_email)
        ->call('save')
        ->assertHasErrors(['user.name'])
        ->assertEmitted('swal:toast');

    // assert new email
    $actual_email = User::find($account->id)->email;
    $this->assertNotEquals($new_email, $actual_email);
});

it("changes account's password", function () {
    // create new user
    $account = User::factory()->create();
    $new_password = faker()->password;

    // update his password
    Livewire::test('account-preferences-edit', ['account' => $account])
        ->set('current_password', 'password') // !from factory file
        ->set('password', $new_password)
        ->set('password_confirmation', $new_password)
        ->call('changePassword')
        ->assertEmitted('swal:toast');

    // assert new password
    $actual_password = User::find($account->id)->password;
    $this->assertTrue(Hash::check($new_password, $actual_password));
});

it("doesn't change account's password when old password is wrong", function () {
    // create new user
    $account = User::factory()->create();
    $new_password = faker()->password;

    // fail attempt to update his password
    Livewire::test('account-preferences-edit', ['account' => $account])
        ->set('current_password', 'not_password') // !from factory file
        ->set('password', $new_password)
        ->set('password_confirmation', $new_password)
        ->call('changePassword')
        ->assertHasErrors(['current_password'])
        ->assertEmitted('swal:toast');

    // assert new password doesn't match the old one
    $actual_password = User::find($account->id)->password;
    $this->assertFalse(Hash::check($new_password, $actual_password));
});

it("doesn't change account's password when the confirmed password isn't matched", function () {
    // create new user
    $account = User::factory()->create();
    $new_password = faker()->password;

    // failed attempt to update his password
    Livewire::test('account-preferences-edit', ['account' => $account])
        ->set('current_password', 'password') // !from factory file
        ->set('password', $new_password)
        ->set('password_confirmation', $new_password . 'extra')
        ->call('changePassword')
        ->assertHasErrors(['password'])
        ->assertEmitted('swal:toast');

    // assert new password doesn't match the old one
    $actual_password = User::find($account->id)->password;
    $this->assertFalse(Hash::check($new_password, $actual_password));
});