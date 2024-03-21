@extends('layouts.admin')
@section('title')
    รายการจองห้องพัก
@endsection
@section('content')
    {{-- @php
    dump($booking)
@endphp --}}
    <h1 class="mt-4">รายการจองห้องพัก</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Booking</li>
    </ol>
    <div id="container">
        <section style="background-color: #eee;">
            <div class="container py-5">
                @foreach ($booking as $item)
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-12 col-xl-10">
                            <div class="card shadow-0 border rounded-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                            <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                                @if ($item->room === null)
                                                    <img src="https://media.istockphoto.com/id/1162708357/th/%E0%B8%A3%E0%B8%B9%E0%B8%9B%E0%B8%96%E0%B9%88%E0%B8%B2%E0%B8%A2/%E0%B8%95%E0%B8%B1%E0%B8%A7%E0%B8%8A%E0%B8%B5%E0%B9%89-null-%E0%B8%97%E0%B8%B5%E0%B9%88%E0%B8%A1%E0%B8%B5%E0%B8%9E%E0%B8%B7%E0%B9%89%E0%B8%99%E0%B8%AB%E0%B8%A5%E0%B8%B1%E0%B8%87%E0%B8%A3%E0%B8%AB%E0%B8%B1%E0%B8%AA%E0%B9%84%E0%B8%9A%E0%B8%99%E0%B8%B2%E0%B8%A3%E0%B8%B5%E0%B9%80%E0%B8%97%E0%B8%84%E0%B9%82%E0%B8%99%E0%B9%82%E0%B8%A5%E0%B8%A2%E0%B8%B5%E0%B8%99%E0%B8%B2%E0%B8%A1%E0%B8%98%E0%B8%A3%E0%B8%A3%E0%B8%A1%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5%E0%B9%84%E0%B8%9A%E0%B8%99%E0%B8%B2%E0%B8%A3%E0%B8%B5%E0%B8%94%E0%B8%B4%E0%B8%88%E0%B8%B4%E0%B8%95%E0%B8%AD%E0%B8%A5%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B9%81%E0%B8%99%E0%B8%A7%E0%B8%84%E0%B8%B4%E0%B8%94%E0%B8%82%E0%B9%89%E0%B8%AD%E0%B8%A1%E0%B8%B9%E0%B8%A5%E0%B8%97%E0%B8%B5%E0%B9%88%E0%B8%9B.jpg?s=1024x1024&w=is&k=20&c=Z52wQuURHi2T_i70w7HL1yvJDyLxEVmuXmYS1jF8NnE="
                                                        alt="เลขห้อง: null" width="100%" height="100px"
                                                        style="object-fit: contain">
                                                    <a href="#!">
                                                        <div class="hover-overlay">
                                                            <div class="mask"
                                                                style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                        </div>
                                                    </a>
                                                @else
                                                    <img src="{{ asset('storage/images/' . basename($item->room->image)) }}"
                                                        alt="เลขห้อง: {{ $item->room->number }}" width="100%"
                                                        height="100px" style="object-fit: contain">
                                                    <a href="#!">
                                                        <div class="hover-overlay">
                                                            <div class="mask"
                                                                style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-xl-6">
                                            @if ($item->room == null)
                                                <h5>ห้องพักที่ ไม่มีห้องพัก</h5>
                                                <div class="mt-1 mb-0 text-muted small">
                                                    <span>รองรับ ไม่มีห้องพัก คน</span>
                                                    <span class="text-primary"> • </span>
                                                    <span>ประเภท ไม่มีห้องพัก<span>
                                                        <span class="text-primary"> • </span>
                                                        <span>ขนาด ไม่มีห้องพัก ตร.ม.<br /></span>
                                                </div>
                                                <div class="mb-2 text-muted small">
                                                    <span>ราคา ไม่มีห้องพัก บาท</span>
                                                    <span class="text-primary"> • </span>
                                                    <span>บรรยากาศ ไม่มีห้องพัก</span>
                                                </div>
                                                <p class="mb-4 mb-md-0">
                                                    เช็คอิน: {{ $item->check_in }} เช็คเอาท์: {{ $item->check_out }}
                                                </p>
                                            @else
                                                <h5>ห้องพักที่ {{ $item->room->number }}</h5>
                                                <div class="mt-1 mb-0 text-muted small">
                                                    <span>รองรับ {{ $item->room->maximum }} คน</span>
                                                    <span class="text-primary"> • </span>
                                                    <span>ประเภท {{ $item->room->type }}</span>
                                                    <span class="text-primary"> • </span>
                                                    <span>ขนาด {{ $item->room->space }} ตร.ม.<br /></span>
                                                </div>
                                                <div class="mb-2 text-muted small">
                                                    <span>ราคา {{ $item->room->price }} บาท</span>
                                                    <span class="text-primary"> • </span>
                                                    <span>บรรยากาศ {{ $item->room->vibe }}</span>
                                                </div>
                                                <p class="mb-4 mb-md-0">
                                                    เช็คอิน: {{ $item->check_in }} เช็คเอาท์: {{ $item->check_out }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                            <div class="d-flex flex-row align-items-center mb-1">
                                                <h4 class="mb-1 me-1">฿ {{ $item->total }}</h4>
                                                {{-- <span class="text-danger"><s>$20.99</s></span> --}}
                                            </div>
                                            @if ($item->room == null)
                                            <h6 class="text-danger">ไม่มีห้องพัก</h6>
                                            @else
                                            <h6 class="text-danger">ตรวจสอบข้อมูลให้แน่ใจก่อนติดต่อลูกค้า</h6>
                                            @endif
                                            <div class="d-flex flex-column mt-4">
                                                @if ($item->room == null)
                                                    <button class="btn btn-outline-danger btn-sm mt-2" type="button">
                                                        ไม่มีห้องพัก
                                                    </button>
                                                @else
                                                    <a href="{{ route('bookingdetail', $item->id) }}"
                                                        class="btn btn-primary btn-sm" type="button">รายละเอียด</a>
                                                @endif

                                                {{-- <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                Add to wishlist
                                            </button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="row justify-content-center mb-3">
                    <div class="col-md-12 col-xl-10">
                        <div class="card shadow-0 border rounded-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/new/img(4).webp"
                                                class="w-100" />
                                            <a href="#!">
                                                <div class="hover-overlay">
                                                    <div class="mask"
                                                        style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5>Quant olap shirts</h5>
                                        <div class="d-flex flex-row">
                                            <div class="text-danger mb-1 me-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span>289</span>
                                        </div>
                                        <div class="mt-1 mb-0 text-muted small">
                                            <span>100% cotton</span>
                                            <span class="text-primary"> • </span>
                                            <span>Light weight</span>
                                            <span class="text-primary"> • </span>
                                            <span>Best finish<br /></span>
                                        </div>
                                        <div class="mb-2 text-muted small">
                                            <span>Unique design</span>
                                            <span class="text-primary"> • </span>
                                            <span>For men</span>
                                            <span class="text-primary"> • </span>
                                            <span>Casual<br /></span>
                                        </div>
                                        <p class="text-truncate mb-4 mb-md-0">
                                            There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or
                                            randomised words which don't look even slightly believable.
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">$14.99</h4>
                                            <span class="text-danger"><s>$21.99</s></span>
                                        </div>
                                        <h6 class="text-success">Free shipping</h6>
                                        <div class="d-flex flex-column mt-4">
                                            <button class="btn btn-primary btn-sm" type="button">Details</button>
                                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                Add to wishlist
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 col-xl-10">
                        <div class="card shadow-0 border rounded-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/new/img(5).webp"
                                                class="w-100" />
                                            <a href="#!">
                                                <div class="hover-overlay">
                                                    <div class="mask"
                                                        style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-xl-6">
                                        <h5>Quant ruybi shirts</h5>
                                        <div class="d-flex flex-row">
                                            <div class="text-danger mb-1 me-2">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <span>145</span>
                                        </div>
                                        <div class="mt-1 mb-0 text-muted small">
                                            <span>100% cotton</span>
                                            <span class="text-primary"> • </span>
                                            <span>Light weight</span>
                                            <span class="text-primary"> • </span>
                                            <span>Best finish<br /></span>
                                        </div>
                                        <div class="mb-2 text-muted small">
                                            <span>Unique design</span>
                                            <span class="text-primary"> • </span>
                                            <span>For women</span>
                                            <span class="text-primary"> • </span>
                                            <span>Casual<br /></span>
                                        </div>
                                        <p class="text-truncate mb-4 mb-md-0">
                                            There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some form, by injected humour, or
                                            randomised words which don't look even slightly believable.
                                        </p>
                                    </div>
                                    <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <h4 class="mb-1 me-1">$17.99</h4>
                                            <span class="text-danger"><s>$25.99</s></span>
                                        </div>
                                        <h6 class="text-success">Free shipping</h6>
                                        <div class="d-flex flex-column mt-4">
                                            <button class="btn btn-primary btn-sm" type="button">Details</button>
                                            <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                Add to wishlist
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
    </div>
@endsection
