<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    //
    public function Listexperience(){
        $experience = Experience::all();
        return view('experience.list', compact('experience'));
    }
    public function Addexperience(){
        return view('experience.add');
    }
    public function AddexperiencePost(Request $request){
        $experience = new Experience;
        $experience->name = $request->name;
        $experience->save();
        return redirect()->route('Experience.List')->with('success', 'Thêm thành công');
    }
    public function Editexperience($id){
        $experience = Experience::find($id);
        return view('experience.edit', compact('experience'));
    }
    public function EditexperiencePost(Request $request, $id){
        $experience = Experience::find($id);
        $experience->name = $request->name;
        $experience->save();
        return redirect()->route('Experience.List')->with('success', 'Cập nhật thành công');
    }
    public function Deleteexperience($id){
        $experience = Experience::find($id);
        $experience->delete();
        return redirect()->route('Experience.List')->with('success', 'Xóa thành công');
    }
}
