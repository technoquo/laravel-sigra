<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Membership extends Model
{
    use HasFactory;

    protected $casts = [
        'videos_id' => 'array',
    ];

    protected $fillable = ['users_id', 'videos_id', 'abonnements_id', 'status'];



    public function users(): BelongsTo
    {
        return $this->BelongsTo(User::class);
        // Include the age_id in the pivot table
    }

    public function abonnements(): BelongsTo
    {
        return $this->BelongsTo(Abonnement::class);
        // Include the age_id in the pivot table
    }

    public function videos()
    {
        return $this->belongsTo(Video::class);
    }
}
