@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách bài đăng của người dùng: <b
                                    class="text-info">
                                    @isset($id)
                                    {{ \App\Models\User::find($id)->first()->email }}</b></h3>
                                    

                                    @endisset
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1"
                                            class="table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        Tiêu Đề</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Loại việc làm</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Số lượng</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Thời gian</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Thu nhập</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Trạng thái</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">Hành động
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">
                                                            {{ $item->title }}
                                                        </td>
                                                        <td> {{ \App\Helpers\CommonFunction::categoryJob(explode(',', $item->id_category_job)) }}
                                                        </td>
                                                        <td>{{ $item->amount }}</td>
                                                        <td>{{ $item->time_start }} <br> đến <br> {{ $item->time_end }}</td>
                                                        <td class="text-center">{{ number_format($item->price_start) }} <br>
                                                            - <br>
                                                            {{ number_format($item->price_end) }} <br> VNĐ</td>
                                                        <td class="text-center">
                                                            <b
                                                                class="text-danger text-center">{{ $item->status == 1 ? 'Vừa tạo' : ($item->status == 2 ? 'Đã duyệt' : ($item->status == 3 ? 'Bị loại' : 'Gửi lại')) }}</b>
                                                            <br>
                                                            <div class="form-group" data-select2-id="44">
                                                                <select id="{{ $item->id }}"
                                                                    class="form-control select2bs4 select2-hidden-accessible changheStatus"
                                                                    style="width: 100%;" data-select2-id="17" tabindex="-1"
                                                                    aria-hidden="true">
                                                                    <option
                                                                        onclick="changeStatusJobs({{ $item->id }}, 1)"
                                                                        {{ $item->status == 1 ? 'selected' : '' }}
                                                                        value="1" data-select2-id="46">Vừa tạo
                                                                    </option>
                                                                    <option
                                                                        onclick="changeStatusJobs({{ $item->id }}, 2)"
                                                                        {{ $item->status == 2 ? 'selected' : '' }}
                                                                        value="2" data-select2-id="47">Đã duyệt
                                                                    </option>
                                                                    <option
                                                                        onclick="changeStatusJobs({{ $item->id }}, 3)"
                                                                        {{ $item->status == 3 ? 'selected' : '' }}
                                                                        value="3" data-select2-id="48">Bị loại(từ
                                                                        chối)</option>
                                                                    <option
                                                                        onclick="changeStatusJobs({{ $item->id }}, 4)"
                                                                        {{ $item->status == 4 ? 'selected' : '' }}
                                                                        value="4" data-select2-id="49">Gửi lại
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td><a href="{{ route('Job.Edit', ['id' => $item->id]) }}"
                                                                class="btn btn-app">
                                                                <i class="fas fa-edit"></i> Sửa
                                                            </a>
                                                            <a href="{{ route('Job.Delete', ['id' => $item->id]) }}"
                                                                class="btn btn-app">
                                                                <i class="fas fa-pause"></i> Xóa
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        jQuery(document).ready(function($) {
            $('#example1').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    'excel',
                    'csv',
                    'pdf',
                    'print'
                ],
            });

        });
    </script>
    <script>
        $('.changheStatus').change(function() {
            let id = $(this).attr('id');
            let status = $(this).val();
            console.log(id, status);
            $.ajax({
                type: 'GET',
                url: "{{ route('Job.Status') }}",
                data: {
                    id: id,
                    status: status
                },
                success: function(data) {
                    alert('oke');
                }
            });
        })
    </script>
@endsection
