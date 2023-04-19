@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách các slide</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">STT</th>
                                        <th>Tiêu Đề</th>
                                        <th>Image</th>
                                        <th>Hiển Thị</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($listSlide as $slide)
                                        @php
                                            $i = $i + 1;
                                        @endphp
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $slide->title }}</td>
                                            {{-- <td>
                                                {{ substr(strip_tags($slide->content), 0, 30) }}
                                            </td> --}}
                                            <td>
                                                <a>Số lượng ảnh : {{ $slide->num_images }}</a>
                                                <a class="btn btn-app"
                                                    href="{{ route('Slide.AddImage', ['id' => $slide->id]) }}">
                                                    <i class="fas fa-file-image"></i> Thêm Ảnh
                                                </a>
                                                <a class="btn btn-app"
                                                    href="{{ route('Slide.Image', ['id' => $slide->id]) }}">
                                                    <i class="fas fa-eye"></i> Xem Ảnh
                                                </a>
                                            </td>
                                            <td>
                                                <input type="checkbox" class="input-switch" name="status"
                                                    value="{{ $slide->status }}" data-slide-id="{{ $slide->id }}"
                                                    data-on-text="On" data-off-text="Off"
                                                    {{ $slide->status == 1 ? 'checked' : '' }}>
                                            </td>
                                            <td style="text-align: center;">
                                                <a class="btn btn-app"
                                                    href="{{ route('Slide.Detail', ['id' => $slide->id]) }}">
                                                    <i class="fas fa-eye"></i> Chi Tiết
                                                </a>
                                                <a class="btn btn-app" href="{{ route('Slide.Edit', ['id' => $slide->id]) }}">
                                                    <i class="fas fa-edit"></i> Sửa
                                                </a>
                                                <a class="btn btn-app"
                                                    onclick=" return confirm('Bạn có chắc chắn muốn xóa không')"
                                                    href="{{ route('Slide.Delete', ['id' => $slide->id]) }}">
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
                var slideId = $(this).data('slide-id'); // lấy giá trị slide_id từ thuộc tính data-slide-id
                $.ajax({
                    url: "{{ route('Slide.Status', ['id' => ':slideId']) }}".replace(':slideId',
                        slideId), // lấy giá trị thực tế của slideId gán vào id khi người dùng thực hiện yêu cầu ajax
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
