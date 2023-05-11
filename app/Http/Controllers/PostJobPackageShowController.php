<?php

namespace App\Http\Controllers;

use App\Models\PostJobPackageShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostJobPackageShowController extends Controller
{
    // hiển thị danh sach package
    public function ListPostJobPackageShow(){
        $listPackageShow = DB::table('post_job_package_show')->get();
        return view('PostJobPackage.List', compact(['listPackageShow']));
    }

    // thêm postjobpackageshow
    public function AddPostJobPackageShow(){
        return view('PostJobPackage.Add',);
    }
    public function AddPostJobPackageShowPost(Request $request){
        $addPostJobPackageShow = new PostJobPackageShow();
        $addPostJobPackageShow->image = $request->image;
        $addPostJobPackageShow->name = $request->name;
        $addPostJobPackageShow->content = $request->content;
        $addPostJobPackageShow->time = $request->time;
        $addPostJobPackageShow->code = $request->code;
        $addPostJobPackageShow->price = $request->price;
        $addPostJobPackageShow->amount = $request->amount;
        $addPostJobPackageShow->save();
        return redirect()->route('PostJobPackageShow.List')->with('success','Thành Công');
    }
    //sửa package
    public function UpdatePostJobPackageShow($id){
        $Update = PostJobPackageShow::find($id);
        return view('PostJobPackage.Edit', compact(['Update']));

    }

    public function UpdatePostJobPackageShowPost(Request $request, $id){
        $editPostJobPackageShow = PostJobPackageShow::find($id);
        $editPostJobPackageShow->image = $request->image;
        $editPostJobPackageShow->name = $request->name;
        $editPostJobPackageShow->content = $request->content;
        $editPostJobPackageShow->time = $request->time;
        $editPostJobPackageShow->code = $request->code;
        $editPostJobPackageShow->price = $request->price;
        $editPostJobPackageShow->amount = $request->amount;
        $editPostJobPackageShow->save();
        return redirect()->route('PostJobPackageShow.List')->with('success','Cập nhật hành Công');

    }
    // xóa package
    public function DeletePostJobPackageShow($id){
        $deletePostJobPackageShow = PostJobPackageShow::find($id);
        $deletePostJobPackageShow->delete();
        return back()->with('success', 'Xóa thành công');
    }

}
