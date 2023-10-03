<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgeController extends Controller
{
    public function index()
    {
        return view('ages.index', [
            'ages' => Age::all()
        ]);
    }




    public function categories($id)
    {
        $age = Age::find($id);

        if ($age) {
            $videos = $age->videos;
            foreach ($videos as $video) {
                $videoId = $video->id;
                $video = Video::find($videoId);
                $categories = $video->categories;
            }

            // $videos now contains a collection of Video models associated with the specified age.
        } else {
            dd('Not Found');
        }


        // $categories = $video->categories;

        if (isset($categories)) {
            return view('categories.index', [
                'categories' => $categories,
                'id' => $id
            ]);
        } else {
            return view('notfound.index');
        }
    }

    public function videos($category_id, $age_id)
    {

        // revisar condicion si existe subcategoria se muestra dos iconos educacion y violencia
        // sino se muestra abajo los videos
        $existe = SubCategory::where('category_id', $category_id)->exists();

        if ($existe) {
            $subcategories = SubCategory::with('videos')->get();

            return view('subcategories.index', [
                'subcategories' => $subcategories,
                'id' => $age_id
            ]);
        } else {


            $videos = $result = DB::table('videos as v')
                ->select('v.id as video_id', 'v.age_id', 'a.name as age', 'v.name as name_video', 'v.vimeo', 'c.name', 'c.image', 'v.type')
                ->join('ages as a', 'a.id', '=', 'v.age_id')
                ->join('category_video as cav', 'cav.video_id', '=', 'v.id')
                ->join('categories as c', 'c.id', '=', 'cav.category_id')
                ->where('c.id', '=', $category_id)
                ->where('a.id', '=', $age_id)
                ->get();
            return view('videos.index', [
                'videos' => $videos
            ]);
        }
    }

    public function subcategories($subcategory_id, $category_id, $age_id)
    {
        $videos = DB::table('categories as c')
            ->join('subcategories as sb', 'c.id', '=', 'sb.category_id')
            ->join('videos as v', 'v.subcategory_id', '=', 'sb.id')
            ->where('sb.id', '=', $subcategory_id)
            ->where('c.id', '=', $category_id)
            ->where('v.age_id', '=', $age_id)
            ->select('v.vimeo', 'v.name  as name_video', 'v.type')
            ->get();
        return view('videos.index', [
            'videos' => $videos
        ]);
    }
}
