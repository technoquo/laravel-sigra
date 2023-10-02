<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Age extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'status'];



    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_video', 'age_id', 'category_id', 'subcategory_id');
    }

    public function categoryAgeVideos()
    {
        return $this->hasMany(CategoryAgeVideo::class, 'age_id');
    }

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk()->url($this->image);
    }
}
