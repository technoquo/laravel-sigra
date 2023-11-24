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
        $this->videos = Video::select('*')
            ->whereIn('id', function ($query) {
                $query->select(DB::raw('MIN(id)'))
                    ->from('videos')
                    ->where('status', 1)
                    ->when($this->search, function ($subquery) {
                        $subquery->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->groupBy('name', 'subcategory_id', 'age_id');
            })
            ->orderBy('name')
            ->get();
    }
    public function render()
    {
        return view('livewire.pop-corn');
    }
}
