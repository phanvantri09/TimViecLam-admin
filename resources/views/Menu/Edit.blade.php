@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('Menu.EditPost', $menu->id)}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Tiêu Đề </label>
                                    <input type="text" value="{{$menu->title}}" name="title" class="form-control" >
                                </div>
                                {{-- <div class="form-group">
                                    <label for="content">Nội Dung </label>
                                    <textarea name="content" id="summernote">{{$slide->content}}</textarea>
                                </div> --}}
                                <div class="form-group">
                                    <label for="tab">URL mặt định</label>
                                    <select name="link_page" class="form-control select2 select2-hidden-accessible"
                                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                                        @foreach ($routes as $item)
                                            <option {{ ($item->id == $menu->link_page) ? 'selected' : '' }} value="{{$item->id}}" data-select2-id="3">Tên: {{$item->name}} || Đường dẫn: {{$item->path}}</option>
                                        @endforeach
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
