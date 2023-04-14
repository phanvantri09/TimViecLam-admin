<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SensitiveKeywordController extends Controller
{
   public function GetKeywordSensitive(){
    return view('admin.keywordSensitive');
   }
   public function PostKeywordSensitive( Request $request ){
      

   }
}
