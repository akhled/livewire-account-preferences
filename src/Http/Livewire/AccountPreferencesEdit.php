<?php

namespace Akhaled\LivewireAccountPreferences\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AccountPreferencesEdit extends Component
{
    public $account;
    public $user;
    public $view;
    public $password;
    public $current_password;
    public $password_confirmation;

    protected $rules = [
        'user.name' => 'required|string|min:6',
        'user.email' => 'required|email|max:500',
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
        $this->validateOnly('password', [
            'password' => 'nullable|required_with:password_confirmation|string|confirmed',
            'current_password' => 'required',
        ]);

        if (!Hash::check($this->current_password, $this->user->password)) {
            $this->addError('current_password', 'Your current password is incorrect.');
            return;
        }

        $this->user->password = bcrypt($this->password);
        $this->user->save();
        $this->reset(['password', 'password_confirmation', 'current_password']);
    }

    public function render()
    {
        return view($this->view ?? config('livewire-account-preferences.views.edit', config('lwap.views.edit')));
    }
}
