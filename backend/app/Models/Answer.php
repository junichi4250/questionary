<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id'
        'name',
        'gender',
        'age_id',
        'email',
        'is_send_email',
        'feedback',
    ];
}
