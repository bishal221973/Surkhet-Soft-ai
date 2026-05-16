<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function contentImages(){
        return $this->hasMany(ContentImage::class);
    }
}
