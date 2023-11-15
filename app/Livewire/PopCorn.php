<?php

namespace App\Livewire;


use App\Models\Video;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\DB;



class PopCorn extends Component
{
    #[Url()]
    public $search = '';

    #[On('search')]
    public function updateSearch($search)
    {

        $this->search = $search;
        $this->loadVideo();
        // $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        //  $this->resetPage();
    }

    public $videos;

    public function mount()
    {
        $this->loadVideo();
    }

    public function loadVideo()
    {
        $this->videos = Video::select('name', DB::raw('MIN(id) as id'), DB::raw('MIN(age_id) as age_id'), DB::raw('MIN(vimeo) as vimeo'))
            ->where('status', 1)
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->orderBy('name')
            ->groupBy('name')
            ->get();
    }
    public function render()
    {
        return view('livewire.pop-corn');
    }
}
