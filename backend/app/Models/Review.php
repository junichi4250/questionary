<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'gender',
        'age_id',
        'email',
        'is_send_email',
        'score',
        'feedback',
    ];

    public function scopeShopEqual($query, $shop) {
        if ($shop) {
            return $query->where('shop_name', $shop);
        }
    }

    public function scopeAgeEqual($query, $age) {
        // 全て
        if ($age == 99) {
            return;
        }
        return $query->where('age', $age);
    }

    public function scopeGenderEqual($query, $gender) {
        // 全て
        if ($gender == 99) {
            return;
        }
        return $query->where('gender', $gender);
    }

    public function scopeCreatedStartDate($query, $start_date) {
        if ($start_date) {
            return $query->where('created_date', '>=', $start_date);
        }
    }

    public function scopeCreatedEndDate($query, $end_date) {
        if ($end_date) {
            return $query->where('created_date', '<=', $end_date);
        }
    }

    public function scopeIsSendEmailEqual($query, $is_send_email) {
        if ($is_send_email) {
            return $query->where('is_send_email', $is_send_email);
        }
    }

    public function scopeKeywordEqual($query, $keyword) {
        if ($keyword) {
            return $query->where('feedback', 'like', "%{$keyword}%");
        }
    }
}
