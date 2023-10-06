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
        return view('ages.index');
    }


    public function subcategories($subcategory_id, $category_id, $age_id)
    {
        $category = Category::where('id', $category_id)->first();
        $age = Age::find($age_id);

        $subcategory = SubCategory::where('id', $subcategory_id)->first();

        $videos = DB::table('categories as c')
            ->join('subcategories as sb', 'c.id', '=', 'sb.category_id')
            ->join('videos as v', 'v.subcategory_id', '=', 'sb.id')
            ->where('sb.id', '=', $subcategory_id)
            ->where('c.id', '=', $category_id)
            ->where('v.age_id', '=', $age_id)
            ->select('v.vimeo', 'v.name  as name_video', 'v.type', 'c.id as category_id', 'v.age_id', 'v.id as video_id', 'sb.name as name_subcategory')
            ->get();


        return view('videos.index', [
            'videos' => $videos,
            'age_id' => $age_id,
            'category' => $category->name,
            'subcategory' => $subcategory->name,
            'age' => $age->name
        ]);
    }
}
