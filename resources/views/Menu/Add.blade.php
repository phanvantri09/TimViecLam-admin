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
                        <form action="{{ route('Menu.AddPost') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Tiêu Đề </label>
                                    <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="status">URL Hiển Thị </label>
                                    <select name="link_page" class="form-control select2 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                        @foreach ($routes as $item)
                                            <option value="{{$item->id}}" data-select2-id="3">Tên: {{$item->name}} || Đường dẫn: {{$item->path}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Hiển Thị </label><br>
                                    <input type="hidden" name="status" value="2">
                                    <input type="checkbox" name="status" data-toggle="switch" data-on-text="On"
                                        data-off-text="Off" value="1">
                                </div>
                                <div class="form-group">
                                    <label for="">Hiển thị cho</label>
                                    <div>
                                        <input type="radio" name="type" value="111">
                                        <label for="status"> Người tìm việc </label>
                                    </div>

                                    <div>
                                        <input type="radio" name="type" value="111">
                                        <label for="status"> Nhà tuyển dụng </label>
                                    </div>

                                    <div>
                                        <input type="radio" name="type" value="333">
                                        <label for="status"> Dành cho tất cả </label>
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
