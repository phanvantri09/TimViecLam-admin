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
                        <form action="{{ route('User.EditPost') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    {{-- @dd($type) --}}
                                    <input type="hidden" name="type" value="{{$data->type}}">
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <label for="exampleInputEmail1">Tên </label>
                                    <input value="{{$data->name}}" type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email </label>
                                    <input value="{{$data->email}}" type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mật khẩu</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
