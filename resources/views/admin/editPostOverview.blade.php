@extends('layouts.master')
@section('content')
    @php
        use App\Helpers\CommonFunction;
        use App\Helpers\CommonVaiation;
    @endphp
    <style>
        .text-primary {
            color: red !important;
        }

        .border {
            border: 1px solid red !important;
        }
    </style>
    <section class="site-section">
        <div class="container">
          <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <div class="d-flex align-items-center">
                <div class="border p-2 d-inline-block mr-3 rounded">
                  <img src="images/job_logo_5.jpg" alt="Image">
                </div>
                <div>
                  <h2>{{empty($editPost->title) ? '' : $editPost->title}}</h2>
                  <div>
                    <span class="m-2"><span class="icon-room mr-2"></span>{{$editPost->address_user}}</span>
                    <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">{{ CommonFunction::typeWork($editPost->id_type_work)->name }}</span></span>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="col-lg-4">
              <div class="row">
                <div class="col-6">
                  <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Lưu</a>
                </div>
                <div class="col-6">
                  <a href="#" class="btn btn-block btn-primary btn-md">Nộp hồ sơ</a>
                </div>
              </div>
            </div> --}}
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="p-3 border rounded mb-4 shadow-red">
                <h3 class="text-primary  mt-3 h4 pl-3 mb-3 font-weight-bold">{{CommonFunction::categoryJob(explode(',', $editPost->id_category_job))}}</h3>
                <hr>
                <div class="row pl-3">
                  <div class="col-lg-3 border-right">
                    <strong class="text-black">Yêu cầu kinh nghiệm</strong>
                    <br>{{ CommonFunction::experienceJob($editPost->id_experience)->name }}
                  </div>
                  <div class="col-lg-3 border-right">
                    <strong class="text-black">Vị trí ứng tuyển</strong>
                    <br>{{ CommonFunction::locationWorkJob(explode(',', $editPost->id_location_work)) }}
                  </div>
                  <div class="col-lg-3 border-right">
                    <strong class="text-black">Cấp bậc</strong>
                    <br>{{ CommonFunction::rankJob(explode(',', $editPost->id_rank)) }}
                  </div>
                  <div class="col-lg-3">
                    <strong class="text-black">Hình thức làm việc</strong>
                    <br>{{ CommonFunction::typeWork($editPost->id_type_work)->name }}
                  </div>
                </div>
                <hr>
                <h3 class="text-primary  mt-3 h4 pl-3 mb-3 font-weight-bold">Thông tin</h3>
                <div class="row pl-3">
                  <ul class="list-unstyled mb-0 col-lg-6">
                    <li class="mb-2"><strong class="text-black">Ngày đăng tuyển:</strong>{{ empty($editPost->time_start) ? '' : $editPost->time_start }}</li>
                    <li class="mb-2"><strong class="text-black">Số lượng tuyển:</strong>{{ empty($editPost->amount) ? '' : $editPost->amount }}</li>
                    <li class="mb-2"><strong class="text-black">Thời gian thử việc:</strong>{{ empty($editPost->time_intern) ? '' : $editPost->time_intern }}</li>
                    <li class="mb-2"><strong class="text-black">Yêu cầu giới tính:</strong>{{ CommonFunction::getSex($editPost->id_sex)->name }}</li>
                    <li class="mb-2"><strong class="text-black">Khu vực tuyển:</strong> {{ CommonFunction::locationCityJob(explode(',', $editPost->id_location_city)) }}</li>
                  </ul>
                  <ul class="list-unstyled mb-0 col-lg-6">
                    <li class="mb-2"><strong class="text-black">Mức lương:</strong> {{ empty($editPost->price_start) ? '' : number_format($editPost->price_start) . 'vnđ' }}
                       -> {{ empty($editPost->price_end) ? '' : number_format($editPost->price_end) . 'vnđ' }}
                    </li>
                    <li class="mb-2"><strong class="text-black">Yêu cầu bằng cấp:</strong>  {{ CommonFunction::degreeJob(explode(',', $editPost->id_degree)) }}</li>
                    <li class="mb-2"><strong class="text-black">Yêu cầu độ tuổi:</strong> {{ CommonFunction::getYearOld($editPost->id_sex)->name }}</li>
                    <li class="mb-2"><strong class="text-black">Hạn nộp hồ sơ:</strong>{{ empty($editPost->time_end) ? '' : $editPost->time_end }}</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 ">
              <div class="p-3 border rounded mb-4 text-black shadow-red">
                <div class="mb-5">
                  <h3 class="h4 d-flex align-items-center mb-4 text-primary font-weight-bold"><span class="icon-align-left mr-3"></span>Mô tả công việc</h3>
                  <p>{!! $editPost->description1 !!}</p>
                </div>
                <div class="mb-5">
                  <h3 class="h4 d-flex align-items-center mb-4 text-primary font-weight-bold"><span class="icon-rocket mr-3"></span>Yêu cầu công việc</h3>
                  <ul class="list-unstyled m-0 p-0">
                    <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>{!! $editPost->request1 !!}</span></li>
                    <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Velit unde aliquam et voluptas reiciendis n Velit unde aliquam et voluptas reiciendis non sapiente labore</span></li>
                    <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Commodi quae ipsum quas est itaque</span></li>
                    <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></li>
                    <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Deleniti asperiores blanditiis nihil quia officiis dolor</span></li>
                  </ul>
                </div>

                <div class="mb-5">
                  <h3 class="h4 d-flex align-items-center mb-4 text-primary font-weight-bold"><span class="icon-book mr-3"></span>Quyền lợi</h3>
                  <ul class="list-unstyled m-0 p-0">
                    <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>{!! $editPost->benefit !!}</span></li>
                    <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Velit unde aliquam et voluptas reiciendis non sapiente labore</span></li>
                    <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Commodi quae ipsum quas est itaque</span></li>
                    <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit</span></li>
                    <li class="d-flex align-items-start mb-2"><span class="icon-check_circle mr-2 text-muted"></span><span>Deleniti asperiores blanditiis nihil quia officiis dolor</span></li>
                  </ul>
                </div>

                <div class="mb-5">
                  <h3 class="h4 d-flex align-items-center mb-4 text-primary font-weight-bold"><span class="icon-turned_in mr-3"></span>Thông tin liên hệ</h3>
                  <ul class="list-unstyled m-0 p-0">
                    <li class="d-flex align-items-start mb-2"><span><strong>Công ty:</strong>{{ $editPost->name_user }}</span></li>
                    <li class="d-flex align-items-start mb-2"><span><strong>Email:</strong>{{ $editPost->email_user }}</span></li>
                    <li class="d-flex align-items-start mb-2"><span><strong>Số điện thoại:</strong>{{ $editPost->number_phone_user }}</span></li>
                    <li class="d-flex align-items-start mb-2"><span><strong>Địa chỉ:</strong>{{ $editPost->address_user }}</span></li>
                  </ul>
                </div>

                {{-- <div class="row mb-5">
                  <div class="col-6">
                    <a href="#" class="btn btn-block btn-light btn-md"><span class="icon-heart-o mr-2 text-danger"></span>Lưu</a>
                  </div>
                  <div class="col-6">
                    <a href="#" class="btn btn-block btn-primary btn-md">Nộp hồ sơ</a>
                  </div>
                </div> --}}
              </div>

              <div class="p-3 border rounded mb-4 shadow-red">
                <h3 class="text-primary  mt-3 h4 pl-3 mb-3 font-weight-bold">Chia sẻ</h3>
                <div class="px-3">
                  <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                  <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                  <a href="#" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
                </div>
              </div>

            </div>

          </div>
        </div>
      </section>
@endsection
