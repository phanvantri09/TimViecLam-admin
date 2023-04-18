<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Helpers\CommonVaiation;
class CommonFunction {
    /*
     * Qui tắt đặt tên Biến hằng ...
     * 100% viếc hoa Thí dụ const HANG
    */
    /*
     * Tên function Viếc Hoa Chữ Đầu Tiên
     * public static function TenFunction(){}
    */

    public static function typeWork($id = null){
        return DB::table('type_work')->where('id',$id)->first();
    }
    public static function categoryJob($arrayId = null){
        $data = DB::table('category_job')->whereIn('id',$arrayId)->pluck('name');
        return implode(' | ',$data->toArray());
    }
    public static function degreeJob($id= null){
        $data = DB::table('degree')->whereIn('id',$id)->pluck('name');
        return implode(' | ',$data->toArray());
    }
    public static function experienceJob($id= null){
        return DB::table('experience')->where('id',$id)->first();
    }
    public static function locationWorkJob($id= null){
        $data = DB::table('location_work')->whereIn('id',$id)->pluck('name');
        return implode(' | ',$data->toArray());
    }
    public static function rankJob($id= null){
        $data = DB::table('rank')->whereIn('id',$id)->pluck('name');
        return implode(' | ',$data->toArray());
    }
    public static function getSex($id= null){
        return DB::table('sex')->where('id',$id)->first();
    }
    public static function locationCityJob($id= null){
        $data = DB::table('location_city')->whereIn('id',$id)->pluck('name');
        return implode(' | ',$data->toArray());
    }
    public static function getYearOld($id= null){
        return DB::table('year_old')->where('id',$id)->first();
    }
    public static function getAllLocationCity(){
        return DB::table('location_city')->get();
    }
    public static function getAllTypeWork(){
        return DB::table('type_work')->get();
    }

    // file là đối số truyền vào, type là type image hoặc là CV
    public static function getUrlStorage($fileName = null, $type = null){
        $url = '';
        if (empty($fileName)) {
            return $url;
        }
        if (!empty($type) && $type == CommonVaiation::NUMBER_TYPE_IMAGE) {
            $url = Storage::url(CommonVaiation::PATH_IMAGE.'/'.$fileName);
        }
        if (!empty($type) && $type == CommonVaiation::NUMBER_TYPE_CV) {
            $url = Storage::url(CommonVaiation::PATH_CV.'/'.$fileName);
        }
        return $url;
    }
    public static function getStatusApplyCurrent($idApply = null){
        $result = '' ;
        foreach (CommonVaiation::STATUS_APPLY as $key => $status) {
            if($key == $idApply){
                $result = $status;
            }
        }
        return $result;
        
    }
}