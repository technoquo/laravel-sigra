<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Video;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;


class VideoController extends Controller
{

    public $search = '';
    public function index($category_id, $age_id)
    {

        // revisar condicion si existe subcategoria se muestra dos iconos educacion y violencia
        // sino se muestra abajo los videos
        $existe = SubCategory::where('category_id', $category_id)->exists();
        $age = Age::find($age_id);

        if ($existe) {
            $subcategories = SubCategory::with('videos')->get();

            $category = Category::where('id', $category_id)->first();


            return view('subcategories.index', [
                'subcategories' => $subcategories,
                'age_id' => $age_id,
                'age' => $age->name,
                'category_id'  => $category->id,
                'category' => $category->name,

            ]);
        } else {

            $category = Category::where('id', $category_id)->first();


            $videos = DB::table('videos as v')
                ->select('v.id as video_id', 'v.age_id', 'a.name as age', 'v.name as name_video', 'v.vimeo', 'c.id as category_id', 'c.name', 'c.image', 'v.type')
                ->join('ages as a', 'a.id', '=', 'v.age_id')
                ->join('category_video as cav', 'cav.video_id', '=', 'v.id')
                ->join('categories as c', 'c.id', '=', 'cav.category_id')
                ->where('c.id', '=', $category_id)
                ->where('a.id', '=', $age_id)
                // ->search($this->search)
                ->get();
            return view('videos.index', [
                'videos' => $videos,
                'age_id' => $age_id,
                'category_id'  => $category->id,
                'category' => $category->name,
                'age' => $age->name

            ]);
        }
    }

    public function show($category_id, $age_id, $video_id)
    {
        $video = Video::select('name', 'vimeo')->where('id', $video_id)->first();


        return view('videos.show', [
            'category_id' => $category_id,
            'age_id' => $age_id,
            'video' => $video
        ]);
    }
}
