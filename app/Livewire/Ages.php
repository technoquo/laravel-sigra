<?php

namespace App\Livewire;

use App\Models\Age;
use Livewire\Component;
use Livewire\Attributes\Computed;

class Ages extends Component
{

    public $ages;


    public function render()
    {
        $this->ages = Age::all();
        return view('livewire.ages');
    }
}
