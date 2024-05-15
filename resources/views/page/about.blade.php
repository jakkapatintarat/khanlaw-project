@extends('layouts.guest')
@section('title')
    เกี่ยวกับเรา
@endsection

@section('content')
    <div class="card mb-3 mt-5">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body ms-5 mt-4">
                    <ins class="card-title h5">เกี่ยวกับ คานหลาว วิวพอยท์</ins>
                    <p class="card-text">{!! $about->content !!}</p>
                </div>
            </div>
            <div class="col-md-4">
                <img src={{ asset('/img/index.jpg') }} class="img-fluid" alt="...">
            </div>
        </div>
    </div>

    {{-- Holly --}}
    <div class="card mb-3 mt-5">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="row row-cols-2">
                    <div class="col"><img src={{ asset('/img/holly/1.jpg') }} class="img-fluid" alt="..."></div>
                    <div class="col"><img src={{ asset('/img/holly/2.jpg') }} class="img-fluid" alt="..."></div>
                    <div class="col"><img src={{ asset('/img/holly/3.jpg') }} class="img-fluid" alt="..."></div>
                    <div class="col"><img src={{ asset('/img/holly/4.jpg') }} class="img-fluid" alt="..."></div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body ms-5 mt-4">
                    <ins class="card-title h5">ห้องพัก Holly</ins>
                    <p class="card-text">รายละเอียด</p>
                    <div class="row" style="float: right;padding-right: 3rem">
                        <a type="button" href="{{ route('roomholly') }}" class="btn btn-info me-5 text-white"
                        >เลือกห้องพัก</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Hazel --}}
    <div class="card mb-3 mt-5">
        <div class="row g-0">
            <div class="col-md-8">
                <div class="card-body ms-5 mt-4">
                    <ins class="card-title h5">ห้องพัก Hazel</ins>
                    <p class="card-text">รายละเอียด</p>
                    <div class="row" style="float: right;padding-right: 3rem">
                        <a type="button" href="{{ route('roomhazel') }}" class="btn btn-info me-5 text-white"
                        >เลือกห้องพัก</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row row-cols-2">
                    <div class="col"><img src={{ asset('/img/hazel/1.jpg') }} class="img-fluid" alt="..."></div>
                    <div class="col"><img src={{ asset('/img/hazel/2.jpg') }} class="img-fluid" alt="..."></div>
                    <div class="col"><img src={{ asset('/img/hazel/3.jpg') }} class="img-fluid" alt="..."></div>
                    <div class="col"><img src={{ asset('/img/hazel/4.jpg') }} class="img-fluid" alt="..."></div>
                </div>
            </div>

        </div>
    </div>

    {{-- เต้นท์กระโจม --}}
    <div class="card mb-3 mt-5">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="row row-cols-2">
                    <div class="col"><img src={{ asset('/img/tent/1.jpg') }} class="img-fluid" alt="..."></div>
                    <div class="col"><img src={{ asset('/img/tent/2.jpg') }} class="img-fluid" alt="..."></div>
                    <div class="col"><img src={{ asset('/img/tent/3.jpg') }} class="img-fluid" alt="..."></div>
                    <div class="col"><img src={{ asset('/img/tent/4.jpg') }} class="img-fluid" alt="..."></div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body ms-5 mt-4">
                    <ins class="card-title h5">ห้องพัก เต้นท์กระโจม</ins>
                    <p class="card-text">รายละเอียด</p>
                    <div class="row" style="float: right;padding-right: 3rem">
                        <a type="button" href="{{ route('roomtent') }}" class="btn btn-info me-5 text-white"
                        >เลือกห้องพัก</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
