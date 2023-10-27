<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Boutique extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'price', 'url', 'status'];

    public function getThumbnailUrl()
    {
        $isUrl = str_contains($this->image, 'http');

        return ($isUrl) ? $this->image : Storage::disk()->url($this->image);
    }
}
