# Welcome

Display and update user preferences with livewire

## [Installation](https://packagist.org/packages/akhaled/livewire-account-preferences)

`composer require akhaled/livewire-account-preferences`

## How to use

Very simple!

1. Add the `LivewireAccountServiceProvider` in `config/app.php` to app's providers:

```php
Akhaled\LivewireAccountPreferences\LWAPServiceProvider::class
```

2. add livewire component markup in your code:

```php
@livewire('account-preferences', [
    'account' => auth()->user()
    'view' => 'account.edit' // optional: create custom view
])
```

The packages uses bootstrap 4 by default. In next release I will enable publishing views to your project directory so you can update them.
