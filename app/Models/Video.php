<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age_id', 'subcategory_id', 'vimeo', 'attachment', 'type', 'status', 'orden'];


    public function ages(): BelongsTo
    {

        return $this->belongsTo(Age::class,  'age_id');
    }

    // public function categories(): belongsTo
    // {

    //     return $this->belongsTo(Category::class, 'category_id');
    // }

    public function categories(): BelongsToMany
    {


        return $this->belongsToMany(Category::class, 'category_video', 'video_id', 'category_id');
        // Include the age_id in the pivot table
    }

    public function subcategories(): BelongsTo
    {

        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
}
