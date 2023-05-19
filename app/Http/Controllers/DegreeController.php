<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    //
    public function ListDegree(){
        $degree = Degree::all();
        return view('degree.list', compact('degree'));
    }
    public function AddDegree(){
        return view('degree.add');
    }
    public function AddDegreePost(Request $request){
        $degree = new Degree;
        $degree->name = $request->name;
        $degree->save();
        return redirect()->route('Degree.List')->with('success', 'Thêm thành công');
    }
    public function EditDegree($id){
        $degree = Degree::find($id);
        return view('degree.edit', compact('degree'));
    }
    public function EditDegreePost(Request $request, $id){
        $degree = Degree::find($id);
        $degree->name = $request->name;
        $degree->save();
        return redirect()->route('Degree.List')->with('success', 'Cập nhật thành công');
    }
    public function DeleteDegree($id){
        $degree = Degree::find($id);
        $degree->delete();
        return redirect()->route('Degree.List')->with('success', 'Xóa thành công');
    }
}
