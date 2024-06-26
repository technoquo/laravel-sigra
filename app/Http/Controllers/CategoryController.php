<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id)
    {

        $allCategories = [];
        $age = Age::find($id);



        if ($age) {
            $videos = $age->videos;



            foreach ($videos as $video) {
                $videoId = $video->id;
                $video = Video::find($videoId);
                $categories = $video->categories;


                foreach ($categories as $category) {
                    if ($category->status == 1) {
                        $categoryId = $category->id;
                        $allCategories[$categoryId] = $category->toArray();
                    }
                }
            }

            $uniqueCategories = array_values($allCategories);









            // $videos now contains a collection of Video models associated with the specified age.
        } else {
            dd('Not Found');
        }




        if (isset($uniqueCategories)) {
            return view('categories.index', [
                'categories' => $uniqueCategories,
                'age_id' => $id,
                'age' => $age->name
            ]);
        } else {
            return view('notfound.index');
        }
    }
}
