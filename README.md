# Welcome

Display and update user preferences with livewire

> The packages uses bootstrap 4 by default. In next release I will enable publishing views to your project directory so you can update them.

## [Installation](https://packagist.org/packages/akhaled/livewire-account-preferences)

`composer require akhaled/livewire-account-preferences`

## How to use

Very simple!

### 1. Add the `LivewireAccountServiceProvider` in `config/app.php` to app's providers:

```php
Akhaled\LivewireAccountPreferences\LWAPServiceProvider::class
```

### 2. Add livewire component markup in your code:

```php
@livewire('account-preferences-edit', [
    'account' => auth()->user()
    'view' => 'account.edit' // optional: create custom view
])

@livewire('account-preferences-show', [
    'account' => auth()->user()
    'view' => 'account.show' // optional: create custom view
])
```

### 3. Extra config file

Publish the configs: `php artisan vendor:publish --tag=table-config`

---

## Define model fields

By default, package assume model has `name`, `email` and `password` fields. If `Model` class has defined `$rules` property it overrides default. Please don't make the `password` column required as changing password is done in separate stage.
Also, you need to define another property to tell component about filed usage.

Example :

```php

class User
{
    ...
    public $rules = [
        'first_name' => 'required|string|min:6',
        'last_name' => 'required|string|min:6',
        'email_address' => 'required|email|max:500',
        ...
    ];

    public $lwap = [
        'first_name' => 'name',
        'last_name' => 'name',
        'email_address' => 'email'
    ]
    ...
}
```

## Available configuration

- `views`:
  - `edit`: Global edit view resource location. If you submit a view with component it overrides the global config.
  - `show`: Global show view resource location. If you submit a view with component it overrides the global config.
- `routes`:
  - `edit`: Edit route name. Default is `/account`
  - `show`: Show route name. Default is `/account/edit`
