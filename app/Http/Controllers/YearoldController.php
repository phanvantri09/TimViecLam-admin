<?php

namespace App\Http\Controllers;


use App\Models\Yearold;
use Illuminate\Http\Request;

class YearoldController extends Controller
{
    //
    public function ListYearold(){
        $yearold = Yearold::all();
        return view('yearold.list', compact('yearold'));
    }
    public function AddYearold(){
        return view('yearold.add');
    }
    public function AddyearoldPost(Request $request){
        $yearold = new Yearold;
        $yearold->name = $request->name;
        $yearold->save();
        return redirect()->route('Yearold.List')->with('success', 'Thêm thành công');
    }
    public function Edityearold($id){
        $yearold = Yearold::find($id);
        return view('yearold.edit', compact('yearold'));
    }
    public function EdityearoldPost(Request $request, $id){
        $yearold = Yearold::find($id);
        $yearold->name = $request->name;
        $yearold->save();
        return redirect()->route('Yearold.List')->with('success', 'Cập nhật thành công');
    }
    public function Deleteyearold($id){
        $yearold = Yearold::find($id);
        $yearold->delete();
        return redirect()->route('Yearold.List')->with('success', 'Xóa thành công');
    }
}
