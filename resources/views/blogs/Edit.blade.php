@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Cập nhật blog</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('Blog.UpdateBlogPost', ['id' => $UpBlog->id])}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Tiêu Đề </label>
                                    <input type="text" name="title" value= "{{ empty($UpBlog->title) ? '' : $UpBlog->title }}" class="form-control" placeholder="Nhập tiêu đề">
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội Dung </label>
                                    <textarea name="content" id="editor">{!! empty($UpBlog->content) ? '' : $UpBlog->content !!}</textarea>
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
          CKEDITOR.replace('editor');
    </script>
    
@endsection
