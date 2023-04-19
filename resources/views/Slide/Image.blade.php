@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách các ảnh trong slide</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Image</th>
                                        <th>Tiêu Đề</th>
                                        <th>Nội Dung</th>
                                        <th>Hiển Thị</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($listImage as $item)
                                        @php
                                            $i = $i + 1;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td><img class="img-thumbnail"
                                                    src="{{ asset(Storage::url('Image/' . $item->image)) }}" >
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td>
                                                {{ substr(strip_tags($item->content), 0, 30) }}
                                            </td>
                                            <td>
                                                <input type="checkbox" class="input-switch" name="status"
                                                    value="{{ $item->status }}" data-image-id="{{ $item->id }}"
                                                    data-on-text="On" data-off-text="Off"
                                                    {{ $item->status == 1 ? 'checked' : '' }}>
                                            </td>
                                            <td style="text-align: center;">
                                                <a class="btn btn-app" href="{{route('Slide.EditImage', ['id' => $item->id])}}">
                                                    <i class="fas fa-edit"></i> Sửa
                                                </a>
                                                <a class="btn btn-app"
                                                    onclick=" return confirm('Bạn có chắc chắn muốn xóa không')"
                                                    href="{{ route('Slide.DeleteImage', ['id' => $item->id]) }}">
                                                    <i class="fas fa-trash-alt"></i> Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <script>
        $(document).ready(function() {
            $('.input-switch').bootstrapSwitch();
            $('.input-switch').on('switchChange.bootstrapSwitch', function(event, state) {
                var status = state ? 1 : 2;
                var imageId = $(this).data('image-id'); // lấy giá trị slide_id từ thuộc tính data-slide-id
                $.ajax({
                    url: "{{ route('Slide.StatusImage', ['id' => ':imageId']) }}".replace(':imageId',
                        imageId), // lấy giá trị thực tế của slideId gán vào id khi người dùng thực hiện yêu cầu ajax
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: status
                    },
                    success: function(response) {
                        if (response.status == 1) {
                            $(this).bootstrapSwitch('state', true);
                        } else {
                            $(this).bootstrapSwitch('state', false);
                        }
                    }.bind(this),
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection
