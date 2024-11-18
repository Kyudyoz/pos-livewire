<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Sidebar extends Component
{

    function logout() {
        Auth::logout();
        $this->redirect(route('login'), true);
    }
    public function render()
    {
        return view('livewire.partial.sidebar');
    }
}
