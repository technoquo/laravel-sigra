<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'status'];

    // public function videos(): HasMany
    // {

    //     return $this->hasMany(Video::class);
    // }

    public function ages()
    {
        return $this->belongsToMany(Age::class, 'category_video', 'category_id', 'age_id');
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class, 'category_video', 'category_id', 'video_id');
    }

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk()->url($this->image);
    }

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
