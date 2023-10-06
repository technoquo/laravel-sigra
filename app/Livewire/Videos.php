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


            if ($video->subcategory_id) {

                $videos = SubCategory::with('videos')->get();
            } else {

                $videos = DB::table('videos as v')
                    ->select('v.id as video_id', 'v.age_id', 'a.name as age', 'v.name as name_video', 'v.vimeo', 'c.id as category_id', 'c.name', 'c.image', 'v.type')
                    ->join('ages as a', 'a.id', '=', 'v.age_id')
                    ->join('category_video as cav', 'cav.video_id', '=', 'v.id')
                    ->join('categories as c', 'c.id', '=', 'cav.category_id')
                    ->where('c.id', '=', $this->category_id)
                    ->where('a.id', '=', $this->age_id)
                    ->where('v.name', 'like', "%{$this->search}%")
                    ->get();
            }
        }

        return $videos;
    }




    public function render()
    {


        return view('livewire.videos');
    }
}
