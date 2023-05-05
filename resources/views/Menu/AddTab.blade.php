@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('Menu.AddTabPost') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Tiêu Đề </label>
                                    <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề">
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội Dung </label>
                                    <textarea name="content" id="summernote"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tab">URL chuyển hướng khi nhấn</label>
                                    <select name="link_page" class="form-control select2 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                        @foreach ($routes as $item)
                                            <option value="{{$item->id}}" data-select2-id="3">Tên: {{$item->name}} || Đường dẫn: {{$item->path}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id_menu" value="{{$id}}">
                                    {{-- <label for="status">Menu</label>
                                    <select name="id_menu" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                        <option selected="selected" >----Chọn Menu----</option>
                                        @foreach ($menu as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                        
                                    </select> --}}
                                </div>
                                <div class="form-group">
                                    <label for="status">Người dùng được hiển thị</label>
                                    <select name="type_user" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true"  required>
                                        <option selected="selected" >----Chọn người dùng được hiển thị----</option>
                                        <option value="111">Người tìm việc</option>
                                        <option value="222">Nhà tuyển Dụng</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Hiển Thị </label><br>
                                    <input type="hidden" name="status" value="2">
                                    <input type="checkbox" name="status" data-toggle="switch" data-on-text="On"
                                        data-off-text="Off" value="1">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            var status = 1; // Giả sử status được thiết lập là 1
            var switchValue = (status == 1) ? true :
            false; // Chuyển đổi giá trị của status thành giá trị của Bootstrap Switch
            $('input[data-toggle="switch"]').bootstrapSwitch('state',
            switchValue); // Đặt giá trị của Bootstrap Switch
        });
    </script>
    
@endsection
