@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Overview Page</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('Overview.ListUser') }}" class="nav-link">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Tổng người dùng</span>
                                    <span class="info-box-number">{{ empty($totalUsers) ? '' : $totalUsers }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="" class="nav-link">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-tie"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Tổng nhà tuyển dụng</span>
                                    <span
                                        class="info-box-number">{{ empty($totalUserRecruit) ? '' : $totalUserRecruit }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="" class="nav-link">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-user-friends"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Tổng người tìm việc</span>
                                    <span
                                        class="info-box-number">{{ empty($totalUserFindJob) ? '' : $totalUserFindJob }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="" class="nav-link">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-mail-bulk"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Tổng bài post</span>
                                    <span class="info-box-number">{{ empty($totalJobs) ? '0' : $totalJobs }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('Overview.ListUser') }}" class="nav-link">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Tổng số apply</span>
                                    <span class="info-box-number">{{ empty($totalApply) ? '0' : $totalApply }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="" class="nav-link">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-solar-panel"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Các ngành nghề</span>
                                    <span
                                        class="info-box-number">{{ empty($totalCategotyJob) ? '0' : $totalCategotyJob }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="" class="nav-link">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i
                                        class="fas fa-skull-crossbones"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Các từ khóa bị cấm</span>
                                    <span
                                        class="info-box-number">{{ empty($totalKeySensitive) ? '0' : $totalKeySensitive }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="" class="nav-link">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-school"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Các mức độ ứng tuyển</span>
                                    <span
                                        class="info-box-number">{{ empty($totalLocationWork) ? '0' : $totalLocationWork }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('Overview.ListUser') }}" class="nav-link">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-poll-people"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Loại hình làm việc</span>
                                    <span class="info-box-number">{{ empty($totalTypeWork) ? '0' : $totalTypeWork }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="" class="nav-link">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fas fa-money-check-edit"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Các cấp bậc làm việc</span>
                                    <span class="info-box-number">{{ empty($totalRank) ? '0' : $totalRank }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="" class="nav-link">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list-alt"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Các degree</span>
                                    <span class="info-box-number">{{ empty($totalDegree) ? '0' : $totalDegree }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="" class="nav-link">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i
                                        class="fas fa-laptop-house"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Các level location work</span>
                                    <span
                                        class="info-box-number">{{ empty($totalLocationWork) ? '0' : $totalLocationWork }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>

                <!-- /.row -->
                <form action="" method="GET">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="type">Loại người dùng:</label>
                            <select class="form-control" id="type" name="type">
                                <option value="">Tất cả</option>
                                <option value="111">Người tìm việc</option>
                                <option value="222">Người tuyển dụng</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_start">Ngày bắt đầu:</label>
                            <input type="date" class="form-control" id="date_start" name="date_start">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_end">Ngày kết thúc:</label>
                            <input type="date" class="form-control" id="date_end" name="date_end">
                        </div>
                    </div>
                </form>
                {{-- <div class="form-row">
                    <table class="table mt-4" id="data-table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Loại người dùng</th>
                                <th>Ngày đăng ký</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Name</td>
                                <td>Email@gmail.com</td>
                                <td>Người tìm việc</td>
                                <td>2022-12-01</td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
            </div>
    </div>
@endsection
