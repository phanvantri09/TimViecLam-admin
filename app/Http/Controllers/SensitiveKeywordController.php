<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class SensitiveKeywordController extends Controller
{
   public function GetKeywordSensitive(){
    $keyWords = DB::table('keyword_sensitive')->pluck('name')->toArray();
    return view('admin.keywordSensitive', compact(['keyWords']));
   }
}
