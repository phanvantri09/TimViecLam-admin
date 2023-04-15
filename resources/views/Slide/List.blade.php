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
                                                <a >Số lượng ảnh : {{$slide->num_images}}</a> 
                                                <a class="btn btn-app" href="{{route('Slide.AddImage',['id' =>$slide->id])}}">
                                                    <i class="fas fa-file-image"></i> Thêm Ảnh
                                                </a>
                                            </td>
                                            <td>
                                                <input type="hidden" name="status" value="2">
                                                <input type="checkbox" name="status" data-toggle="switch" data-on-text="On"
                                                    data-off-text="Off" value="1">
                                            </td>
                                            <td style="text-align: center;" >
                                                <a class="btn btn-app" href="{{route('Slide.Detail',['id' =>$slide->id])}}">
                                                    <i class="fas fa-eye"></i> Chi Tiết
                                                </a>
                                                <a class="btn btn-app" href="#">
                                                    <i class="fas fa-edit"></i> Sửa
                                                </a>
                                                <a class="btn btn-app" href="#">
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

            var status = 1; // Giả sử status được thiết lập là 1
            var switchValue = (status == 1) ? true :
                false; // Chuyển đổi giá trị của status thành giá trị của Bootstrap Switch
            $('input[data-toggle="switch"]').bootstrapSwitch('state',
                switchValue); // Đặt giá trị của Bootstrap Switch
        });
    </script>
@endsection
