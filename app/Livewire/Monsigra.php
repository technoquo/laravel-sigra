<?php

namespace App\Livewire;

use App\Models\Video;
use Livewire\Component;
use App\Models\Membership;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;

class Monsigra extends Component
{

    #[Url()]
    public $search = '';

    #[On('search')]
    public function updateSearch($search)
    {
        $this->search = $search;
        // $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        //  $this->resetPage();
    }



    #[Computed()]
    public function monsigra()
    {
        $videosIds = [];
        $videoIdsArray = [];


        $monsigras = Membership::where('users_id', Auth::id())->get();
        
        foreach ($monsigras as $monsigra) {

            foreach ($monsigra->videos_id as $value) {
                array_push($videosIds, Video::where('id', $value)
                    ->where('name', 'LIKE', '%' . $this->search . '%')
                    ->distinct()
                    ->get());
            }
        }


        foreach ($videosIds as $videoId) {
            $videoIdsArray[] = $videoId;
        }

        
        return $videoIdsArray ?? [];
    }


    public function render()
    {



        return view('livewire.monsigra');
    }
}
