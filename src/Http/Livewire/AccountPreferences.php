<?php

namespace Akhaled\LivewireAccountPreferences\Http\Livewire;

use Livewire\Component;

class AccountPreferences extends Component
{
    public $account;
    public $user;
    public $view;

    protected $rules = [
        'user.name' => 'required|string|min:6',
        'user.email' => 'required|email|max:500',
        'user.password' => 'string|max:500'
    ];

    public function mount()
    {
        $this->user = $this->account;
    }

    public function save()
    {
        $this->validate();
        $this->user->save();
    }

    public function changePassword()
    {
        $this->validateOnly('user.password');
        $this->user->save();
    }

    public function render()
    {
        return view($this->view ?? 'lwap::livewire.account-preferences');
    }
}
