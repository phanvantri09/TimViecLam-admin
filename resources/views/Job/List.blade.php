@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="dt-buttons btn-group flex-wrap">
                                            <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0"
                                                aria-controls="example1" type="button">
                                                <span>Copy</span>
                                            </button>
                                            <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0"
                                                aria-controls="example1" type="button">
                                                <span>CSV</span>
                                            </button>
                                            <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                                aria-controls="example1" type="button">
                                                <span>Excel</span>
                                            </button>
                                            <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0"
                                                aria-controls="example1" type="button">
                                                <span>PDF</span>
                                            </button>
                                            <button class="btn btn-secondary buttons-print" tabindex="0"
                                                aria-controls="example1" type="button">
                                                <span>Print</span>
                                            </button>
                                            <div class="btn-group">
                                                <button
                                                    class="btn btn-secondary buttons-collection dropdown-toggle buttons-colvis"
                                                    tabindex="0" aria-controls="example1" type="button"
                                                    aria-haspopup="true">
                                                    <span>Column visibility</span>
                                                    <span class="dt-down-arrow"></span>
                                                </button>
                                            </div>
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
                                                        <td>{{ $item->category->name }}</td>
                                                        <td>{{ $item->amount }}</td>
                                                        <td>{{ $item->time_start }} <br> {{ $item->time_end }}</td>
                                                        <td>{{ number_format($item->price_start) }} <br>
                                                            {{ number_format($item->price_end) }} <br> VNĐ</td>
                                                        <td>{{ $item->status == 1 ? 'Vừa tạo' : ($item->status == 2 ? 'Đã duyệt' : ($item->status == 3 ? 'Bị loại' : 'Gửi lại')) }}
                                                            <br>
                                                            <div class="form-group" data-select2-id="44">
                                                                <label>Minimal</label>
                                                                <select id="{{$item->id}}"
                                                                    class="form-control select2bs4 select2-hidden-accessible changheStatus"
                                                                    style="width: 100%;" data-select2-id="17"
                                                                    tabindex="-1" aria-hidden="true">
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
                                                        <td><a href="{{ route('Job.Edit', ['id'=>$item->id]) }}" class="btn btn-app">
                                                                <i class="fas fa-edit"></i> Sửa
                                                            </a>
                                                            <a href="{{ route('Job.Delete', ['id'=>$item->id]) }}" class="btn btn-app">
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
