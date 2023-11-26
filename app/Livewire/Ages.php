<?php

namespace App\Livewire;

use App\Models\Age;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Computed;

class Ages extends Component
{

    public $ages;
    public $categoryPopCorn;


    public function render()
    {
        $this->ages = Age::all();
        $this->categoryPopCorn = Category::where('id', 11)->first();


        return view('livewire.ages');
    }
}
