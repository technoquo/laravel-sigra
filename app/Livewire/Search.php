<?php

namespace App\Livewire;

use App\Models\Video;
use Livewire\Attributes\Url;
use Livewire\Component;

class Search extends Component
{

    #[Url]
    public $search = '';

    public function render()
    {
        $results = [];
        if (strlen($this->search) > 0) {
            
        $results = Video::where('name', 'like', '%' . $this->search . '%')->get();
        }
        return view('livewire.search', compact('results'));
    }
}
