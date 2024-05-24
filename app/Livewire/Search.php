<?php

namespace App\Livewire;

use App\Models\Membership;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;

class Search extends Component
{

    #[Url]
    public $search = '';

    public function render()
    {

        // $desiredVideoIds = Membership::where('users_id', auth()->user()->id)->pluck('videos_id')->flatten()->toArray();
        $results = [];

        if (strlen($this->search) > 0) {

            if (Auth::check()) {

                $results = Video::where('name', 'like', '%' . $this->search . '%')
                    ->whereIn('type', ['privé', 'public'])
                    ->select('id', 'name') // Selecciona solo el nombre para agrupar
                    ->distinct()
                    ->groupBy('id', 'name') // Agrupa por nombre para evitar duplicados
                    ->get()
                    ->unique('name');
            } else {

                $results = Video::where('name', 'like', '%' . $this->search . '%')
                    ->where('type', '!=', 'privé')
                    ->distinct()
                    ->groupBy('id', 'name') // Agrupa por nombre para evitar duplicados
                    ->get()
                    ->unique('name');
            }

            // $results = Video::where('name', 'like', '%' . $this->search . '%')
            //     ->whereIn('id', $desiredVideoIds)
            //     ->get();
        }

        return view('livewire.search', compact('results'));
    }
}
