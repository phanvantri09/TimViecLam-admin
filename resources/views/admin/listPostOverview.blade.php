@extends('layouts.master')
@section('content')
<section class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách các bài post</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="dt-buttons btn-group flex-wrap">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="example1_filter" class="dataTables_filter">
                                            <label>Search: <input type="search" class="form-control form-control-sm"
                                                    placeholder="" aria-controls="example1">
                                            </label>
                                        </div>
                                    </div>
                                </div>
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
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Tên việc làm</th>
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
                                                        aria-label="CSS grade: activate to sort column ascending">Hành động
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listPost as $list)
                                                    <tr class="odd">
                                                        <td class="dtr-control sorting_1" tabindex="0">
                                                            {{ $list->title }}
                                                        </td>
                                                        <td>{{ $list->id_category_job }}</td>
                                                        <td>{{ $list->id_type_work }}</td>
                                                        <td>{{ $list->amount }}</td>
                                                        <td>{{ $list->time_start }} <br> {{ $list->time_end }}</td>
                                                        <td>{{ $list->price_start }} <br> {{ $list->price_end }}</td>
                                                        <td><a href="" class="btn btn-app">
                                                                <i class="fas fa-edit"></i> Sửa
                                                            </a>
                                                            <a href="" class="btn btn-app">
                                                                <i class="fas fa-pause"></i> Xóa
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example1_info" role="status"
                                            aria-live="polite">
                                            Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="example1_previous">
                                                    <a href="#" aria-controls="example1" data-dt-idx="0"
                                                        tabindex="0" class="page-link">Previous</a>
                                                </li>
                                                <li class="paginate_button page-item active">
                                                    <a href="#" aria-controls="example1" data-dt-idx="1"
                                                        tabindex="0" class="page-link">1</a>
                                                </li>
                                                <li class="paginate_button page-item ">
                                                    <a href="#" aria-controls="example1" data-dt-idx="2"
                                                        tabindex="0" class="page-link">2</a>
                                                </li>
                                                <li class="paginate_button page-item ">
                                                    <a href="#" aria-controls="example1" data-dt-idx="3"
                                                        tabindex="0" class="page-link">3</a>
                                                </li>
                                                <li class="paginate_button page-item ">
                                                    <a href="#" aria-controls="example1" data-dt-idx="4"
                                                        tabindex="0" class="page-link">4</a>
                                                </li>
                                                <li class="paginate_button page-item ">
                                                    <a href="#" aria-controls="example1" data-dt-idx="5"
                                                        tabindex="0" class="page-link">5</a>
                                                </li>
                                                <li class="paginate_button page-item ">
                                                    <a href="#" aria-controls="example1" data-dt-idx="6"
                                                        tabindex="0" class="page-link">6</a>
                                                </li>
                                                <li class="paginate_button page-item next" id="example1_next">
                                                    <a href="#" aria-controls="example1" data-dt-idx="7"
                                                        tabindex="0" class="page-link">Next</a>
                                                </li>
                                            </ul>
                                        </div>
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
        $('.changheStatus').change(function(){
            let id = $(this).attr('id');
            let status = $(this).val();
            console.log(id, status);
            $.ajax({
                    type: 'GET',
                    url: "{{route('Job.Status')}}",
                    data: {
                        id : id ,
                        status : status
                    },
                    success: function(data) {
                        alert('oke');
                    }
                });
        })
    </script>
  
@endsection