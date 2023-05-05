@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
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
                                    <div class="col-sm-12">
                                        <table id="example1"
                                            class="table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        Tên</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Email</th>
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
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $item->name }}
                                                        </td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->status }}</td>
                                                        <td>
                                                            @if ($item->type == 111)
                                                            <a href="{{ route('User.Apply', ['id'=>$item->id]) }}" class="btn btn-app">
                                                                <i class="nav-icon fas fa-book"></i> 
                                                                Bài
                                                            </a>
                                                            @else
                                                            {{-- ($item->status === 222) --}}
                                                            <a href="{{ route('User.Job', ['id'=>$item->id]) }}" class="btn btn-app">
                                                                <i class="nav-icon fas fa-book"></i>
                                                                Bài

                                                            </a>
                                                            @endif
                                                            
                                                            <a href="{{ route('User.Edit', ['id'=>$item->id]) }}" class="btn btn-app">
                                                                <i class="fas fa-edit"></i> Sửa
                                                            </a>
                                                            <a href="{{ route('User.Delete', ['id'=>$item->id]) }}" class="btn btn-app">
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
@endsection
