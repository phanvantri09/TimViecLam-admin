<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    
    protected $table = 'slides';
    protected $filable = [];

    public function image(){
        return $this->hasMany(ImageSlide::class, 'id_slide');
    }
}
