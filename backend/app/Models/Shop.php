<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Review;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }
}
