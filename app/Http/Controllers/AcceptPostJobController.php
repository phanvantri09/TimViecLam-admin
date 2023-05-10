<?php

namespace App\Http\Controllers;

use App\Models\PostJob;
use Illuminate\Http\Request;

class AcceptPostJobController extends Controller
{
    public function AcceptPostJob(){
        $acceptPostJob = PostJob::where('status', 1)->get();
        foreach($acceptPostJob as $accept){
            $accept -> status = 2;
            $accept -> save();
        }
    return redirect()->route('home')->with('success', 'Duyệt thành công'); 
    }
}
