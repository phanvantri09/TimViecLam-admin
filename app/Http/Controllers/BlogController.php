<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

use App\Models\Blogs;

class BlogController extends Controller
{
    public function ListBlog(){
        $List = DB::table('blogs')->get();
        return view('blogs.List', compact(['List']));
    }
    public function AddBlog(){
        return view('blogs.Add');
    }
    public function AddBlogPost(Request $request){
        $blog  = new Blogs();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();
        return redirect()->route('Blog.List')->with('success','Thành Công');

    }
    public function DeleteBlog($id){

        $deteleBlog = Blogs::find($id);
        $deteleBlog->delete();
        return back()->with('success', 'Xóa thành công');

    }

    public function UpdateBlog($id){

        $UpBlog = Blogs::find($id);
        return view('blogs.Edit', compact(['UpBlog']));

    }

    public function UpdateBlogPost(Request $request, $id){
        $editBlog = Blogs::find($id);
        $editBlog->title = $request->title;
        $editBlog->content = $request->content;
        $editBlog->save();
        return back()->with('success', 'Cập nhật thành công');

    }
}
