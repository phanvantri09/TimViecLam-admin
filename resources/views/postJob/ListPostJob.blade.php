@extends('layouts.master')
@section('content')
    @php
        use App\Helpers\CommonFunction;
        use App\Helpers\CommonVaiation;
    @endphp
    <style>
    /* style for job listing block */
    .job-listing {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
    }

    /* style for job title */
    .job-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    /* style for company name */
    .company-name {
        font-size: 18px;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 10px;
    }

    /* style for job location */
    .job-location {
        font-size: 16px;
        margin-bottom: 10px;
    }

    /* style for job type */
    .job-type {
        font-size: 10px;
        font-weight: bold;
        color: #fff;
        background-color: #dc3545;
        padding: 2px 10px;
        border-radius: 20px;
        display: inline-block;
    }
    .btn-primary {
        float: left;
        transform: translateY(70%);
    }
    </style>
    <section class="site-section" id="next">
        <div class="container-fluid">
            <div class="row mb-5" style="justify-content: center">
                <div class="col-md-12 text-center mb-5">
                    @if ($count > 0)
                        <a href="{{ route('AcceptPostJob.accept') }}" class="btn btn-primary">Duyệt tất cả</a>
                    @endif
                </div>
                @php
                    $count = 0;
                @endphp
                @foreach ($listPostJob as $post)
                    @if ($post->status == 1)
                        @php
                            $count++;
                        @endphp
                        <div class="col-md-6">
                            <div class="job-listing">
                                <a   class="job-title">{{ $post->title }}</a>
                                <div class="company-name">Công ty: {{ $post->name_user }}</div>
                                <div class="job-location"><span class="icon-room"></span> {{ $post->address_user }}</div>
                                <div class="job-type">{{ CommonFunction::typeWork($post->id_type_work)->name }}</div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @if ($count == 0)
                    <div class="col-md-12 text-center">
                        <p>Hiện tại chưa có bài Job nào ở trạng thái duyệt.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
    @endsection
