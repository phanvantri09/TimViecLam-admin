@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm Ảnh Slide</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('Slide.AddImagePost') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="id_slide" class="form-control" value="{{ $id }}">
                                <div class="form-group">
                                    <label for="title">Tiêu Đề </label>
                                    <input type="text" name="title" class="form-control" placeholder="Nhập tiêu đề"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội Dung </label>
                                    <textarea name="content" id="summernote" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Image</label> <br>
                                    <label class="btn btn-primary btn-md btn-file">Chọn ảnh
                                        <input name="image" type="file" hidden onchange="previewImage()">
                                    </label><br>
                                    <img id="image_preview"
                                        style=" width: 300px; height: auto; margin-right: 2em;">
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

        function previewImage() {
            var fileImage = document.querySelector('input[name=image]').files[0];
            if (fileImage) {
                var mediabase64data;
                getBase64(fileImage).then(
                    mediabase64data => $('#image_preview').attr('src', mediabase64data)
                );
            }
        }

        function getBase64(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => resolve(reader.result);
                reader.onerror = error => reject(error);
            });
        }
    </script>
@endsection
