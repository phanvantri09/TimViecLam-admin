@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('PostJobPackageShow.UpdatePost', ['id' => $Update->id]) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">Ảnh</label>
                                    <input type="file" name="image" class="form-control-file">
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nhập tên gói" value = "{{ empty($Update->name) ? '' : $Update->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội dung</label>
                                    <textarea name="content" id="editor" class="form-control">{!!  empty($Update->content) ? '' : $Update->content  !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="time">Thời gian</label>
                                    <input type="text" name="time" class="form-control" placeholder="Nhập thời gian" value="{{  empty($Update->time) ? '' : $Update->time  }}">
                                </div>
                                <div class="form-group">
                                    <label for="code">Mã gói</label>
                                    <input type="text" name="code" class="form-control" placeholder="Nhập mã gói" value = "{{  empty($Update->code) ? '' : $Update->code  }}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Giá</label>
                                    <input type="text" name="price" class="form-control" placeholder="Nhập giá"value="{{  empty($Update->price) ? '' : $Update->price  }}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Số lượng</label>
                                    <input type="text" name="amount" class="form-control" placeholder="Nhập số lượng"value="{{  empty($Update->amount) ? '' : $Update->amount  }}">
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
        CKEDITOR.replace('editor');

    </script>
    
@endsection
