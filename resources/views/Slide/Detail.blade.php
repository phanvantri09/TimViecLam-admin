@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Chi Tiết Slide</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="title">Tiêu Đề </label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $slideDetail->title }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="content">Nội Dung </label>
                                    <textarea name="content" id="summernote" readonly> {{ $slideDetail->content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="title">URL PAGE </label>
                                    <input type="text" name="" class="form-control"
                                        value="{{ $slideDetail->link_page }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="Image">Image</label>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($slideImage as $item)
                                        @php
                                            $i = $i + 1;
                                            $caption = 'caption' . $i;
                                        @endphp
                                        <div class="{{ $caption }}" style="display:none">
                                            <h4>{{ $item->title }}</h4>
                                            <p>{{ strip_tags($item->content) }}</p>
                                        </div>
                                    @endforeach


                                    <div class="container-box">
                                        <div id="lightgallery">
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($slideImage as $item)
                                                @php
                                                    $i = $i + 1;
                                                    $caption = '.caption' . $i;
                                                @endphp
                                                <a data-sub-html="{{ $caption }}"
                                                    href="{{ Storage::url('Image/' . $item->image) }}"><img
                                                        class="img-thumbnail"
                                                        src="{{ asset(Storage::url('Image/' . $item->image)) }}"></a>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                        </form>
                        <div class="card-footer">
                            <button class="btn btn-primary"><a
                                    style="
                                color: white;"class="fas fa-arrow-circle-left"
                                    href="{{ route('Slide.List') }}">Quay lại</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
            // lightbox.init();
            $("#lightgallery").lightGallery();
        });
    </script>
@endsection
