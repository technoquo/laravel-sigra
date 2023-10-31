<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'image', 'status', 'category_id'];
    protected $table = 'subcategories';

    public function categories(): belongsTo
    {


        return $this->belongsTo(Category::class, 'category_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'subcategory_id', 'id');
    }

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk()->url($this->image);
    }
}
