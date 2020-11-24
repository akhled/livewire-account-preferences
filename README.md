# Welcome <!-- omit in toc -->

Display and update user preferences with livewire

> The packages uses bootstrap 4 by default. In next release I will enable publishing views to your project directory so you can update them.

- [Installation](#installation)
- [How to use](#how-to-use)
- [Define model fields](#define-model-fields)
- [Available configuration](#available-configuration)

## [Installation](https://packagist.org/packages/akhaled/livewire-account-preferences)

`composer require akhaled/livewire-account-preferences`

## How to use

Very simple!

### 1. Add `ServiceProvider` in `config/app.php` <!-- omit in toc -->

```php
    ...
    Akhaled\LivewireAccountPreferences\ServiceProvider::class
    ...
```

### 2. Add livewire component markup in your code <!-- omit in toc -->

edit.blade.php

```php
...
@livewire('account-preferences-edit', [
    'account' => auth()->user()
    'view' => 'account.edit' // optional, overrides global config property
])
...
```

show.blade.php

```php
...
@livewire('account-preferences-show', [
    'account' => auth()->user()
    'view' => 'account.show' // optional, overrides global config property
])
...
```

### 3. Include [livewire-sweetalert](https://github.com/akhled/livewire-sweetalert) scripts along with @livewireScripts <!-- omit in toc -->

If you want to enable sweetalert2 toast.

```blade
...
    @livewireScripts
    @livewireSweetalertScripts
...
```

### 4. Extra config file <!-- omit in toc -->

Publish the configs: `php artisan vendor:publish --tag=livewire-account-preferences`.
> See [available configuration](#available-configuration)

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
