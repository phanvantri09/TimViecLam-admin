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
                        <form action="{{ route('Menu.EditTabPost', $tabMenu->id )}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Tiêu Đề </label>
                                    <input type="text" name="title" class="form-control" value="{{$tabMenu->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội Dung </label>
                                    <textarea name="content" id="summernote">{{$tabMenu->content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tab">URL Redirect</label>
                                    <input type="text" name="tab" class="form-control"
                                    value="{{$tabMenu->tab}}">
                                </div>
                                <div class="form-group">
                                    <label for="status">Menu</label>
                                    <select name="id_menu" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                        
                                        @foreach ($menu as $item)
                                        @if ($tabMenu->id_menu == $item->id)
                                            <option value="{{$item->id}}" selected="selected" >{{$item->title}}</option>             
                                        @endif
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Người dùng được hiển thị</label>
                                    <select name="type_user" class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true"  required>
                                        @if ($tabMenu->id_menu == 111)
                                            <option selected="selected" value="111">Người tìm việc</option>
                                            <option  value="222">Nhà tuyển Dụng</option>
                                        @else
                                            <option selected="selected" value="222">Nhà tuyển Dụng</option>
                                            <option value="111">Người tìm việc</option>
                                        @endif
                                        
                                    </select>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
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
