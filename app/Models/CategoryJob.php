<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryJob extends Model
{
    use HasFactory;
    protected $table ="category_job";
    public function job()
    {
        return $this->hasOne(Jobs::class,'id_category_job');
    }
}
