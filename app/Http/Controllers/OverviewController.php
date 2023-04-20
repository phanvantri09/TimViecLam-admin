<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OverviewController extends Controller
{
  public function OverView()
  {
    //tổng người dùng
    $totalUsers = DB::table('users')->count();
    // tổng người tuyển dụng
    $totalUserRecruit = DB::table('users')->where('type', 111)->count();
    //tổng người tìm việc
    $totalUserFindJob = DB::table('users')->where('type', 222)->count();
    //tổng số ứng tuyển
    $totalApply = DB::table('apply')->count();
    // tổng jobs
    $totalJobs = DB::table('post_job')->count();
    // ngành nghề
    $totalCategotyJob = DB::table('category_job')->count();
    // tổng từ khóa bị cấm
    $totalKeySensitive = DB::table('keyword_sensitive')->count();
    //tổng level
    $totalLocationWork = DB::table('location_work')->count();
    $totalTypeWork = DB::table('type_work')->count();
    $totalRank = DB::table('rank')->count();
    $totalDegree = DB::table('degree')->count();
    return view('admin.overView', compact(['totalUsers', 'totalUserRecruit', 'totalUserFindJob', 'totalApply', 'totalJobs', 'totalCategotyJob', 'totalKeySensitive', 'totalLocationWork', 'totalTypeWork', 'totalRank', 'totalDegree']));
  }
  public function ListUserOverView()
  {
    $users = User::all();
    return view('admin.ListUserOverview', compact(['users']));
  }
  public function ListPostOverView(){
    $listPost = DB::table('post_job')->get();
    return view('admin.listPostOverview',compact(['listPost']));
  }

  public function EditListPostOverView($id){
    $editPost = DB::table('post_job')->where('id', $id)->get()[0];
    return view('admin.editPostOverview',compact(['editPost']));
  }

}