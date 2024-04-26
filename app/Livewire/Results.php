<?php

namespace App\Livewire;

use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\Attributes\Computed;


class Results extends Component
{

    public $video_id;

    public function render()
    {

        $results  = DB::table('category_video as cv')
        ->join('categories as c', 'cv.category_id', '=', 'c.id')
        ->join('videos as v', 'cv.video_id', '=', 'v.id')
        ->join('ages as a', 'v.age_id', '=', 'a.id')
        ->select('v.name as name_video', 'v.vimeo', 'v.type', 'a.name as age', 'cv.category_id', 'a.id as age_id', 'cv.video_id')
        ->where('cv.video_id', $this->video_id)        
        ->get();

        return view('livewire.results', compact('results'));
    }
}
