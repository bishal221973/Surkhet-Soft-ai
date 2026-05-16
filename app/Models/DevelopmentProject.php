<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevelopmentProject extends Model
{
    use HasFactory;



    protected $casts = [
    'images' => 'array',
    'tags'   => 'array',
];

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(DevelopmentCategory::class, 'development_category_id');
    }
}
