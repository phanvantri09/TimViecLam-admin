<?php

namespace App\Http\Controllers;

use App\Models\TabMenu;
use Illuminate\Http\Request;
use App\Models\Menus;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
   public function AddMenu(){
    $title = "Menu";
    return view('Menu.Add',compact('title'));
   }
   public function AddMenuPost(Request $request){

    $menu = new Menus();
    $menu->title = $request->title;
    $menu->link_page = $request->link_page;
    $menu->status = $request->status;
    $menu->save();

    return redirect()->route('Menu.List')->with('success', 'Thêm thành công');
   }
   public function ListMenu(){
    $title = "Menu";
    $listMenu = Menus::leftJoin('tab_menu','menus.id','=','tab_menu.id_menu')
                    ->select('menus.*',DB::raw('COUNT(tab_menu.id) as num'))
                    ->groupBy('menus.id')
                    ->orderByDesc('menus.id')->get();
    
    return view('Menu.List', compact(['title','listMenu']));
   }

   public function Delete($id){
    $del = Menus::find($id);
    $del->delete();
    return back()->with('success', 'Xóa thành công');
   }
   public function DeleteTab($id){
    $del = TabMenu::find($id);
    $del->delete();
    return back()->with('success', 'Xóa thành công');
   }
   public function Status(Request $request, $id){
    $menu = Menus::find($id);

        if ($request->input('status') == 1) {
            $menu->status = $request->input('status');
            $menu->save();

            return response()->json(['status' => 1]);
        } else {
            $menu->status = $request->input('status');
            $menu->save();
            return response()->json(['status' => 2]);
        }
    }
    
    public function StatusTab(Request $request, $id){
        $tabMenu = TabMenu::find($id);
    
            if ($request->input('status') == 1) {
                $tabMenu->status = $request->input('status');
                $tabMenu->save();
    
                return response()->json(['status' => 1]);
            } else {
                $tabMenu->status = $request->input('status');
                $tabMenu->save();
                return response()->json(['status' => 2]);
            }
        }
    public function AddMenuTab(){
        $title = "Tab Menu";
        $menu = Menus::all();
        
        return view('Menu.AddTab',compact(['title','menu']));
    }
    public function AddMenuTabPost(Request $request){
        $tabMenu = new TabMenu();

        $tabMenu->title = $request->title;
        $tabMenu->content = $request->content;
        $tabMenu->tab = $request->tab;
        $tabMenu->id_menu = $request->id_menu;
        $tabMenu->type_user = $request->type_user;
        $tabMenu->status = $request->status;
        $tabMenu->save();

        return redirect()->route('Menu.List')->with('success', 'Thêm thành công');
    }
    
    public function ListTab($id){

        $listTab = TabMenu::where('id_menu', $id)->orderBy('id', 'desc')->get();
        $title = "Danh sách Tab trong menu";

        return view('Menu.ListTab',compact(['title', 'listTab']));
    }

    public function Edit($id){
        $title = "Sửa ";
        $menu = Menus::find($id);
        return view('Menu.Edit', compact(['title','menu']));
    }
    public function EditPost(Request $request, $id){
        $menu = Menus::find($id);
        $menu->title = $request->title;
        $menu->link_page = $request->link_page;
        $menu->save();
        return back()->with('success', 'Cập nhật thành công');
    }
    public function EditTab($id){
        $title = "Sửa ";
        $menu = Menus::all();
        $tabMenu = TabMenu::find($id);
        return view('Menu.EditTab', compact(['title','tabMenu','menu']));
    }
    public function EditTabPost(Request $request, $id){
        $tabMenu = TabMenu::find($id);

        $tabMenu->title = $request->title;
        $tabMenu->content = $request->content;
        $tabMenu->tab = $request->tab;
        $tabMenu->id_menu = $request->id_menu;
        $tabMenu->type_user = $request->type_user;
        $tabMenu->save();

        return back()->with('success', 'Thêm thành công');
    }
}
