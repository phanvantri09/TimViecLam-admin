<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostJob;

class ListPostJobController extends Controller
{
    public function ListPostJob(){
        $listPostJob = PostJob::where('status', 1)->get();
        $count = $listPostJob->count();
        return view('postJob.ListPostJob',compact(['listPostJob','count']));
    }
}
