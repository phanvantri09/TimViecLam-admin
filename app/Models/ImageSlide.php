<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSlide extends Model
{
    use HasFactory;

    protected $table = 'image_slide';
    protected $filable = [];

    public function slide(){
        return $this->belongsTo(Slide::class, 'id_slide');
    }
}
