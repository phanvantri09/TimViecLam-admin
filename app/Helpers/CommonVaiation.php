<?php

namespace App\Helpers;

class CommonVaiation {
    /*
     * Qui tắt đặt tên Biến hằng ...
     * 100% viếc hoa ngăn cachs bởi dấu "_" Thí dụ const KHAI_BAO_HANG_DAY
     * Lưu ý trước khi tạo 1 hằng thì nhớ comment tác dụng sinh ra nó là gì
    */
    /*
     * Tên function Viếc Hoa Chữ Đầu Tiên
     * public static function TenFunction(){}
    */

    // thông báo
    const NOTICATION_SUCCESS = "Thành công";
    const NOTICATION_ERROR = "Không thành công";
    const NOTICATION_INFOR_MIDDELWARE = "Bạn cần đăng nhập để vào trang này";
    const NOTICATION_SUCCESS_FIXED = "Chọn mẫu cố định thành công";
    const NOTICATION_ERROR_FIXED = "Bạn đã chọn mẫu cố định trước đó";
    const NOTICATION_ERROR_NOT_HAVE_FIXED = "Bạn chưa có mẫu hãy tạo mẫu mặt định từ danh sách này";
    const NOTICATION_INFOR_SEARCH = "Không có kết quả hợp lệ, bạn có thể thao khảo một vài bài đăng mới nhất ở dưới";
    // loại user
    const TYPE_USER_TIM_VIEC = 111;
    const TYPE_USER_TUYEN_DUNG = 222;
    const TYPE_USER_ADMIN = 333;
    const ID_USER_NO_LOGIN = 0;
    // trạng thái người dùng
    const STATUS_CREATED = 1;
    const STATUS_LOCK = 2;
    const STATUS_UN_LOCK = 3;
    const STATUS_BASIC = 4;
    const STATUS_MEDIUM = 5;
    const STATUS_PRO = 6;

    // path image
    const PATH_IMAGE = "Image";
    const PATH_CV = "CV";

    // type image and CV
    const NUMBER_TYPE_IMAGE = 1;
    const NUMBER_TYPE_CV = 2;

    // request message
    const REQUIRED_REQUEST = "không được để trống";
    const  IMAGELOGO = 'images/logo_main.jpg';

    // paginate record
    const PAGINATE_RECORD = 12;
    const STATUS_APPLY =[
                            1=>"Vừa Tạo",
                            2=>"Duyệt",
                            3=>"Loại",
                        ] ;
}
