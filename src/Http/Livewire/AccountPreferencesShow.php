<?php

namespace Akhaled\LivewireAccountPreferences\Http\Livewire;

use Livewire\Component;

class AccountPreferencesShow extends Component
{
    public $account;
    public $view;
    public $name;
    public $email;

    public function mount()
    {
        foreach ($this->account->lwap as $key => $prop) {
            $this->$prop = $this->account->$key;
        }
    }

    public function render()
    {
        return view($this->view ?? 'lwap::livewire.show.account-preferences');
    }
}
