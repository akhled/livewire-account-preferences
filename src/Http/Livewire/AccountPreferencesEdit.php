<?php

namespace Akhaled\LivewireAccountPreferences\Http\Livewire;

use Akhaled\LivewireSweetalert\Toast;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AccountPreferencesEdit extends Component
{
    use Toast;

    public $account;
    public $user;
    public $view;
    public $password;
    public $current_password;
    public $password_confirmation;

    /**
     * The rules for validation
     *
     * @var array
     */
    protected $rules = [
        'user.name' => 'bail|required|string|min:6',
        'user.email' => 'bail|required|email|max:500',
    ];

    /**
     * Fires on livewire initialize
     *
     * @return void
     */
    public function mount()
    {
        $this->user = $this->account;
    }

    /**
     * Save the $lwap variables except password
     *
     * @return void
     */
    public function save()
    {
        $this->validate();
        $this->user->save();

        $this->toast('Your information has been updated!', 'success');
    }

    /**
     * Change password (validation + update)
     *
     * @return void
     */
    public function changePassword()
    {
        $this->validateOnly('password', [
            'password' => 'bail|nullable|required_with:password_confirmation|string|confirmed',
            'current_password' => 'bail|required',
        ]);

        if (!Hash::check($this->current_password, $this->user->password)) {
            $this->addError('current_password', 'Your current password is incorrect.');
            return;
        }

        $this->user->password = bcrypt($this->password);
        $this->user->save();
        $this->toast('Password has been changed!', 'success');
        $this->emit('password-updated');
        $this->reset(['password', 'password_confirmation', 'current_password']);
    }

    /**
     * Show toast error message if error bag has a thing
     *
     * @return void
     */
    public function showToastForValidationError()
    {
        $errorBag = $this->getErrorBag()->all();

        if (count($errorBag) > 0) $this->toast($errorBag[0], 'error');
    }

    /**
     * Render the livewire component
     *
     * @return view
     */
    public function render()
    {
        $this->showToastForValidationError();

        return view($this->view ?? config('livewire-account-preferences.views.edit'));
    }
}