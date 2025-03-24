<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $scrolled = false;
    public $cartCount = 0;

    public function mount($scrolled = false)
    {
        $this->scrolled = $scrolled;
        $this->cartCount = session('cart_count', 0);
    }

    public function render()
    {
        return view('livewire.navbar', [
            'user' => Auth::user(),
        ]);
    }
}
