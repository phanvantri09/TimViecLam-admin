@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thêm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <form action="{{ route('Job.AddPost') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i>
                                        Tiêu đề</label>
                                    <input name="title" type="text" class="form-control is-invalid" id="inputError"
                                        placeholder="Enter ...">
                                    @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Loại việc làm</label>
                                            <select name="id_category_job" class="form-control">
                                                @foreach ($categoryJob as $cate)
                                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('id_category_job')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Số lượng tuyển:</label>
                                            <input type="number" name="amount" class="form-control" placeholder="Enter ...">
                                            @error('amount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Thu nhập ít nhất:</label>
                                            <input type="number" name="price_start" class="form-control" placeholder="Enter ...">
                                            @error('price_start')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Thu nhập cao nhất:</label>
                                            <input name="price_end" type="number" class="form-control" placeholder="Enter ...">
                                            @error('price_end')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Thời gian bắt đầu tuyển:</label>
                                            <input type="date" name="time_start" class="form-control" placeholder="Enter ...">
                                            @error('time_start')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Thời gian kết thúc tuyển:</label>
                                            <input name="time_end" type="date" class="form-control" placeholder="Enter ...">
                                            @error('time_end')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea name="content" class="form-control" rows="6" placeholder="Enter ..."></textarea>
                                            @error('content')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Textarea Disabled</label>
                                            <textarea class="form-control" rows="3" placeholder="Enter ..." disabled=""></textarea>
                                        </div>
                                    </div> --}}
                                </div>
                                <button type="submit" class="btn btn-block btn-success btn-lg">Tạo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
