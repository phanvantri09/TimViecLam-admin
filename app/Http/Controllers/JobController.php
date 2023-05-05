<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\PostJob;
use App\Models\CategoryJob;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Job\CreateJob;
use App\Http\Requests\Job\UpdateJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    protected $title = "Tuyển Dụng";
    public function Add(){
        $title = "Tuyển Dụng";
        $categoryJob = CategoryJob::where('status', 5)->get();
        return view('Job.Add', compact(['categoryJob','title']));
    }
    public function AddPost(CreateJob $request){
        $title = "Tuyển Dụng";
        // dd(Auth::user()->id);
        $data = new Jobs();
        $data->title= $request->title;
        $data->id_category_job= $request->id_category_job;
        $data->amount= $request->amount;
        $data->price_start= $request->price_start;
        $data->price_end= $request->price_end;
        $data->time_start= $request->time_start;
        $data->time_end= $request->time_end;
        $data->content= $request->content;
        $data->id_user_create= $request->id_user_create;
        $data->id_user= Auth::user()->id;
        $data->id_user_create = Auth::user()->id;
        $data->save();
        return back()->with('oke', 'Thành công');
    }
    public function Edit($id){
        $title = "Tuyển Dụng";
        $data = Jobs::find($id);
        $categoryJob = CategoryJob::all();
        return view('Job.Edit', compact(['categoryJob','data','title']));
    }
    public function EditPost(UpdateJob $request){
        $data = Jobs::find($request->id);
        $data->title= $request->title;
        $data->id_category_job= $request->id_category_job;
        $data->amount= $request->amount;
        $data->price_start= $request->price_start;
        $data->price_end= $request->price_end;
        $data->time_start= $request->time_start;
        $data->time_end= $request->time_end;
        $data->content= $request->content;
        $data->id_user_create= $request->id_user_create;
        $data->id_user_update= Auth::user()->id;
        $data->save();
        return back()->with('oke', 'Thành công');
    }
    public function List(){
        $title = "Tuyển Dụng";
        $data = Jobs::all();
        $categoryJob = CategoryJob::all();
        return view('Job.List', compact(['categoryJob','data','title']));
    }
    public function Delete(UpdateJob $id){
        $id->status = 5;//status delete
        $id->save();
        back()->with('oke', 'Thành công');
    }
    public function Status(Request $request){
        // $data = Jobs::find($request->id);
        $data = PostJob::find($request->id);
        $data->status = $request->status;
        $data->save();
    }
}
