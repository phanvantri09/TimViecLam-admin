<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Jobs;
use App\Models\Apply;
use App\Models\CategoryJob;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class UserController extends Controller
{
    // public $title = " Người dùng ";

    // public function __construct($title)
    // {
    //     $this->title = $title;
    // }

    
    public function List($type){
        $title = "Người dùng";
        $data = User::where('type', $type)->get();
        return view('User.List', compact(['title', 'data']));
    }
    public function Add($type){
        $title = "Người dùng";
        return view('User.Add', compact(['title', 'type']));
    }
    public function AddPost(Request $request){
        $title = "Người dùng";
        // dd($request->type);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->type = $request->type;
        $data->save();
        return back()->with('oke', "Thành công");        
    }
    public function Edit($id){
        $title = "Người dùng";
        $data = User::find($id);
        return view('User.Edit', compact(['title', 'data']));
    }
    public function EditPost(Request $request){
        $title = "Người dùng";
        $data = User::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;
        if (isset($request->password)) {
        $data->password = $request->password;
        }
        $data->type = $request->type;
        $data->save();
        return back()->with('oke', "Thành công");        
    }
    public function Delete(User $id){
        $id->status = 5;
        $id->save();
        return back()->with('oke', "Thành công"); 
    }

    public function Apply($id){
        $data = Apply::where('id_user',$id)->get();
        return view('User.Apply');
    }
    public function Job($id){
        $title = "Bài Tuyển Dụng";
        $data = Jobs::where('id_user',$id)->get();
        $categoryJob = CategoryJob::all();
        return view('Job.List', compact(['categoryJob','data','title']));
    }
}
