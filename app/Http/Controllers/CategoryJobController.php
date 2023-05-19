<?php

namespace App\Http\Controllers;

use App\Models\CategoryJob;
use Illuminate\Http\Request;

class CategoryJobController extends Controller
{
    //
    public function ListCategoryJob(){
        $catejob = CategoryJob::all();
        return view('categoryjob.list', compact('catejob'));
    }
}
