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
<livewire:user-preferences wire:model="User" /> // where User is user's eloquent model
```
