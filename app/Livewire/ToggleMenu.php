<?php

namespace App\Livewire;

use Livewire\Component;

class ToggleMenu extends Component
{
    public $mostrar = false;

    public function toggleMenu()
    {

        $this->mostrar = !$this->mostrar;
    }



    public function render()
    {
        return view('livewire.toggle-menu');
    }
}
