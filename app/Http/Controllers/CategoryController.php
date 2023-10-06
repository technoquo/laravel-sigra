<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Video;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($id)
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
                'age_id' => $id,
                'age' => $age->name
            ]);
        } else {
            return view('notfound.index');
        }
    }
}
