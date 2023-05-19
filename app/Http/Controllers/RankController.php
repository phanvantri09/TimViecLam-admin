<?php

namespace App\Http\Controllers;

use App\Models\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    //
    public function Listrank(){
        $rank = Rank::all();
        return view('rank.list', compact('rank'));
    }
    public function Addrank(){
        return view('rank.add');
    }
    public function AddrankPost(Request $request){
        $rank = new Rank;
        $rank->name = $request->name;
        $rank->save();
        return redirect()->route('Rank.List')->with('success', 'Thêm thành công');
    }
    public function Editrank($id){
        $rank = Rank::find($id);
        return view('rank.edit', compact('rank'));
    }
    public function EditrankPost(Request $request, $id){
        $rank = Rank::find($id);
        $rank->name = $request->name;
        $rank->save();
        return redirect()->route('Rank.List')->with('success', 'Cập nhật thành công');
    }
    public function Deleterank($id){
        $rank = Rank::find($id);
        $rank->delete();
        return redirect()->route('Rank.List')->with('success', 'Xóa thành công');
    }
}
