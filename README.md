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

## Available configuration

- `views`:
  - `edit`: Global edit view resource location. If you submit a view with component it overrides the global config.
  - `show`: Global show view resource location. If you submit a view with component it overrides the global config.
