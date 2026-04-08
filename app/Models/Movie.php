<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movie';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    // Nếu bảng có updated_at thì bỏ dòng trên, dùng:
    // const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'movie_name',
        'movie_name_vn',
        'original_name',
        'image',
        'image_link',
        'backdrop',
        'backdrop_link',
        'tagline',
        'tagline_vn',
        'overview',
        'overview_vn',
        'runtime',
        'budget',
        'revenue',
        'popularity',
        'vote_average',
        'vote_count',
        'country_code',
        'country_name',
        'trailer',
        'release_date',
        'status'
    ];
}