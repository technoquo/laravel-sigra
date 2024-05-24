<?php

namespace App\Livewire;

use App\Models\Age;
use App\Models\Category;
use App\Models\Membership;
use Livewire\Component;
use Livewire\Attributes\Computed;

class Ages extends Component
{

    public $ages;
    public $categoryPopCorn;
    public $monSigraFan;


    public function render()
    {
        $this->ages = Age::all();
        $this->categoryPopCorn = Category::where('id', 11)->first();
        $this->monSigraFan = Category::where('name', 'like', '%mon sigra fan%')->first();
        return view('livewire.ages');
    }
}
