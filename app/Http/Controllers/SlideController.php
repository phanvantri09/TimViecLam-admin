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
}
