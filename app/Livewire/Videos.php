<?php

namespace App\Livewire;


use App\Models\Age;
use App\Models\Video;
use Livewire\Component;
use App\Models\SubCategory;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;

class Videos extends Component
{
    public $category_id;
    public $age_id;

    public $video_id;


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
    public function videos()
    {

        $age = Age::find($this->age_id);

        $this->age_id = $age->id;



        $videos = $age->videos;

        foreach ($videos as $video) {
            $videoId = $video->id;
            $video = Video::find($videoId);
            $videos = SubCategory::with('videos')
                ->where('category_id', $this->category_id)
                ->get();
            if ($videos->isEmpty()) {
                $videos = DB::table('category_video as cv')
                    ->join('categories as c', 'cv.category_id', '=', 'c.id')
                    ->join('videos as v', 'cv.video_id', '=', 'v.id')
                    ->join('ages as a', 'v.age_id', '=', 'a.id')
                    ->select('v.name as name_video', 'v.vimeo', 'v.type', 'a.name as age', 'cv.category_id', 'a.id as age_id', 'cv.video_id')
                    ->where('c.id', $this->category_id)
                    ->where('a.id', $this->age_id)
                    ->where('v.name', 'like', "%{$this->search}%")
                    ->get();
            } else {
                $videos = SubCategory::with('videos')->get();
            }
        }







        return $videos;
    }





    public function render()
    {


        return view('livewire.videos');
    }
}
