@extends('layouts.master')
@section('content')
    <style>
        #error {
            color: red;
        }
    </style>
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
                        <form action="" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="hidden" name="type" value="">
                                    <input type="hidden" name="id" value="">
                                    <label for="exampleInputEmail1">Tên </label>
                                    <input value="" type="text" name="name" class="form-control" id="exampleInputEmail1"
                                        placeholder="nhập thử xem sao">
                                    <div id="error" style="display: none;">Xin hãy nhập lại vì chứa từ cấm</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    $(document).ready(function() {
        $('input[type="text"]').on('input', function() {
            var inputText = $(this).val();
            var keywords = {!! json_encode(DB::table('keyword_sensitive')->pluck('name')->toArray()) !!};
            var found = false;
            for (var i = 0; i < keywords.length; i++) {
                if (inputText.indexOf(keywords[i]) !== -1) {
                    found = true;
                    break;
                }
            }
            if (found) {
                $('#error').show();
                $(this).val('');
            } else {
                $('#error').hide();
            }
        });
    });
    </script>
@endsection
