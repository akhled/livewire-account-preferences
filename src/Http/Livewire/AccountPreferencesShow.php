<?php

namespace Akhaled\LivewireAccountPreferences\Http\Livewire;

use Exception;
use Livewire\Component;

class AccountPreferencesShow extends Component
{
    public $account;
    public $view;
    public $name;
    public $email;

    public function mount()
    {
        if (!isset($this->account->lwap)) throw new Exception('You need to specify the $lwap properties you want to edit in the model. See: https://github.com/akhled/livewire-account-preferences#define-model-fields', 1);

        foreach ($this->account->lwap as $key => $prop) {
            // replace $key with column name if the key is not defined by developer
            if (is_int($key)) $key = $prop;
            $this->$prop = $this->account->$key;
        }
    }

    public function render()
    {
        return view($this->view ?? config('livewire-account-preferences.views.show', config('lwap.views.show')));
    }
}
