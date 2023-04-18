<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\ImageSlide;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class SlideController extends Controller
{
    public function AddSlide(){
        $title = "Slide";
        return view('Slide.Add', compact('title'));
    }
    public function AddSlidePost(Request $request){
        $slide  = new Slide();

        $slide->title = $request->title;
        $slide->status = $request->status;
        $slide->content = $request->content;
        $slide->link_page = $request->link_page;
        $slide->save();

 
        return redirect()->route('Slide.List')->with('success','Thành Công');
    }
    public function ListSlide(){
        
        $listSlide = Slide::leftJoin('image_slide', 'slides.id', '=', 'image_slide.id_slide')
                ->select('slides.*', DB::raw('COUNT(image_slide.id) as num_images'))
                ->groupBy('slides.id')
                ->orderByDesc('slides.id')
                ->get();
        
        $title = "Slide";
        return view('Slide.List', compact(['title', 'listSlide']));
    }

    public function SlideDetail($id){
        $title = "Slide";
        $slideDetail = Slide::find($id);
        $slideImage = $slideDetail->image()->where('id_slide', '=', $id)->get();

        return view('Slide.Detail', compact(['title', 'slideDetail','slideImage']));
    }
    public function Delete($id){
        $delImage = Slide::find($id);
        $delImage->delete();
        return back()->with('success', 'Xóa thành công');
    }
    public function Image($id){
        $title= "Image Slide";
        $listImage = ImageSlide::where('id_slide', $id)->get();
        return view('Slide.Image',compact(['title','listImage']));
    }

    public function AddImage($id){
        $title = "Image Slide";
        return view('Slide.AddImage', compact(['title','id']));
    }

    public function AddImagePost(Request $request){
        $imageSlide = new ImageSlide();

        $imageSlide->id_slide = $request->id_slide;
        $imageSlide->status = $request->status;
        $imageSlide->title = $request->title;
        $imageSlide->content = $request->content;
        if($request->image){
            $current_time = time();
            $time_string = date('d-m-Y-H-i-s', $current_time);
            $image = $request->image;
            // lấy tên đuôi của file
            $ext = $image->extension();
            //tên đường dẫn được lưa vào folder và database
            $imageName =  'Image_Slide-'.$request->id_slide.'-'. $time_string.'.'.$ext;
            Storage::putFileAs('public/Image', $image, $imageName);
            $imageSlide->image = $imageName;
        }
        $imageSlide->save();
        return redirect()->route('Slide.List')->with('success','Thêm ảnh thành công');
    }
    public function DeleteImage($id){
        $delImage = ImageSlide::find($id);
        Storage::delete('public/Image/' . $delImage->image);
        $delImage->delete();
        return back()->with('success', 'Xóa thành công');
    }
    public function Status(Request $request, $id){
        $slide = Slide::find($id);

        if ($request->input('status') == 1) {
            $slide->status = $request->input('status');
            $slide->save();

            return response()->json(['status' => 1]);
        } else {
            $slide->status = $request->input('status');
            $slide->save();
            return response()->json(['status' => 2]);
        }
        
    }

    public function StatusImage(Request $request, $id){
        $image = ImageSlide::find($id);

        if ($request->input('status') == 1) {
            $image->status = $request->input('status');
            $image->save();

            return response()->json(['status' => 1]);
        } else {
            $image->status = $request->input('status');
            $image->save();
            return response()->json(['status' => 2]);
        }  
    }

    public function Edit($id){
        $title = "Sửa Slide";
        $slide = Slide::find($id);
        return view('Slide.Edit', compact(['title','slide']));
    }
    public function EditPost(Request $request, $id){
        $slide = Slide::find($id);
        $slide->title = $request->title;
        $slide->content = $request->title;
        $slide->link_page = $request->link_page;
        $slide->save();
        return back()->with('success', 'Cập nhật thành công');
    }

    public function EditImage($id){
        $title = "Sửa ảnh Slide";
        $image = ImageSlide::find($id);
        return view('Slide.EditImage', compact(['title','image']));
    }
    public function EditImagePost(Request $request, $id){
        $image = ImageSlide::find($id);
        $image->title = $request->title;
        $image->content = $request->title;
        if($request->image){
            Storage::delete('public/Image/' . $image->image);
            $current_time = time();
            $time_string = date('d-m-Y-H-i-s', $current_time);
            $fileImage = $request->image;
            // lấy tên đuôi của file
            $ext = $fileImage->extension();
            //tên đường dẫn được lưa vào folder và database
            $imageName =  'Image_Slide-'.$request->id_slide.'-'. $time_string.'.'.$ext;
            Storage::putFileAs('public/Image', $fileImage, $imageName);
            $image->image = $imageName;
            
        }
        
        $image->save();
        return back()->with('success', 'Cập nhật thành công');
    }

    
}
