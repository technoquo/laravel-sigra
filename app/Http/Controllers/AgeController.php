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


    public function subcategories($subcategory_id, $category_id, $age_id, Request $request)
    {

        $category = Category::where('id', $category_id)->first();
        $age = Age::find($age_id);

        $subcategory = SubCategory::where('id', $subcategory_id)->first();

        if ($subcategory_id == 1) {

            $videos = DB::table('categories as c')
                ->join('subcategories as sb', 'c.id', '=', 'sb.category_id')
                ->join('videos as v', 'v.subcategory_id', '=', 'sb.id')
                ->where('sb.id', '=', $subcategory_id)
                ->where('c.id', '=', $category_id)
                ->where('v.age_id', '=', $age_id)
                ->where('v.name', 'LIKE', '%' . $request->input('search') . '%') // Add this line for search
                ->where('v.orden', '!=', 0)
                ->orderBy('v.orden', 'ASC')
                ->select('v.vimeo', 'v.name  as name_video', 'v.type', 'c.id as category_id', 'v.age_id', 'v.id as video_id', 'v.attachment', 'sb.name as name_subcategory')
                ->get();
        } else {
            $videos = DB::table('categories as c')
                ->join('subcategories as sb', 'c.id', '=', 'sb.category_id')
                ->join('videos as v', 'v.subcategory_id', '=', 'sb.id')
                ->where('sb.id', '=', $subcategory_id)
                ->where('c.id', '=', $category_id)
                ->where('v.age_id', '=', $age_id)
                ->where('v.name', 'LIKE', '%' . $request->input('search') . '%') // Add this line for search
                ->select('v.vimeo', 'v.name  as name_video', 'v.type', 'c.id as category_id', 'v.age_id', 'v.id as video_id', 'v.attachment', 'sb.name as name_subcategory')
                ->get();
        }

        return view('videos.index', [
            'videos' => $videos,
            'age_id' => $age_id,
            'category' => $category->name,
            'subcategory' => $subcategory->name,
            'subcategory_id' => $subcategory_id,
            'category_id' => $category_id,
            'search' => $request->input('search'),
            'age' => $age->name
        ]);
    }
}
