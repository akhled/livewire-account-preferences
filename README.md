# Welcome

Display and update user preferences with livewire

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
