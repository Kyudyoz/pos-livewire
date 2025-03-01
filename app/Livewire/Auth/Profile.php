<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $name;
    public $email;
    public $password;

    public ?User $user;

    public function simpan()
    {
        $valid  = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => ''
        ]);

        if (!isset($this->password)) {
            unset($valid['password']);
        }

        $this->user->update($valid);

        $this->reset();
        $this->mount();
    }
    public function mount()
    {
        $user = Auth::user();
        $this->user = User::find(Auth::id());
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function render()
    {
        return view('livewire.auth.profile');
    }
}
