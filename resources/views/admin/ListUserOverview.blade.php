@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thông tin tổng người dùng</h1>
                </div>
            </div><!-- /.col -->
</div>
<div id="user-info" style="">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>id</th>
          <th>Type</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{ isset($user['id']) ? $user['id'] : '' }}</td>
            <td>{{ isset($user['type']) ? $user['type'] : '' }}</td>
            <td>{{ isset($user['name']) ? $user['name'] : '' }}</td>
            <td>{{ isset($user['email']) ? $user['email'] : '' }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
        


    
@endsection