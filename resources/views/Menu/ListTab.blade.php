@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tab trong menu</h3>
                            
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tiêu Đề</th>
                                        <th>Nội dung</th>
                                        <th>Url Redirect</th>
                                        <th>Người dùng hiển thị</th>
                                        <th>Hiển Thị</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>                                   
                                    @foreach ($listTab as $item)                                       
                                        <tr>                                           
                                            <td>{{ $item->title }}</td>
                                            <td>{{ substr(strip_tags($item->content), 0, 30) }}</td>
                                            <td>{{ $item->tab }}</td>
                                            <td>
                                                @if ($item->title == 111)
                                                    Tìm Việc
                                                @else
                                                    Tuyển Dụng
                                                @endif
                                            </td>
                                            <td>
                                                <input type="checkbox" class="input-switch" name="status"
                                                    value="{{ $item->status }}" data-menu-id="{{ $item->id }}"
                                                    data-on-text="On" data-off-text="Off"
                                                    {{ $item->status == 1 ? 'checked' : '' }}>
                                            </td>
                                            <td style="text-align: center;">
                                                <a class="btn btn-app" href="{{route('Menu.EditTab',['id' => $item->id])}}">
                                                    <i class="fas fa-edit"></i> Sửa
                                                </a>
                                                <a class="btn btn-app"
                                                    onclick=" return confirm('Bạn có chắc chắn muốn xóa không')"
                                                    href="{{route('Menu.DeleteTab',['id'=> $item->id])}}">
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
                var menuId = $(this).data('menu-id'); // lấy giá trị slide_id từ thuộc tính data-slide-id
                $.ajax({
                    url: "{{ route('Menu.StatusTab', ['id' => ':menuId']) }}".replace(':menuId',
                    menuId), // lấy giá trị thực tế của slideId gán vào id khi người dùng thực hiện yêu cầu ajax
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
