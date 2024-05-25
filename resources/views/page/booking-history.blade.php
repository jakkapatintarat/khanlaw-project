@extends('layouts.overflow')

@section('title')
    ประวัติการจอง
@endsection

@section('content')
    <div id="container">
        <section style="background-color: #eee;">
            <div class="container py-5">
                @foreach ($booking as $item)
                    <?php
                    $timezone = new DateTimeZone('UTC');
                    $checkIn = date_create($item->check_in, $timezone);
                    $checkOut = date_create($item->check_out, $timezone);
                    ?>
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
                                                <h5>ห้องพักที่ถูกลบ</h5>
                                                <div class="mt-1 mb-0 text-muted small">
                                                    <span>ห้องพักที่ถูกลบ</span>
                                                    <span class="text-primary"> • </span>
                                                    <span>ห้องพักที่ถูกลบ<span>
                                                            <span class="text-primary"> • </span>
                                                            <span>ห้องพักที่ถูกลบ<br /></span>
                                                </div>
                                                <div class="mb-2 text-muted small">
                                                    <span>ห้องพักที่ถูกลบ</span>
                                                    <span class="text-primary"> • </span>
                                                    <span>ห้องพักที่ถูกลบ</span>
                                                </div>
                                                <p class="mb-4 mb-md-0">
                                                    เช็คอิน: {{ date_format($checkIn, 'd/m/Y') }} เช็คเอาท์:
                                                    {{ date_format($checkOut, 'd/m/Y') }}
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
                                                    เช็คอิน: {{ date_format($checkIn, 'd/m/Y') }} เช็คเอาท์:
                                                    {{ date_format($checkOut, 'd/m/Y') }}
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
                                                {{-- <h6 class="text-danger">ตรวจสอบข้อมูลให้แน่ใจก่อนติดต่อลูกค้า</h6> --}}
                                            @endif
                                            <div class="d-flex flex-column mt-4">
                                                @if ($item->room == null)
                                                    <button class="btn btn-outline-danger btn-sm mt-2" type="button">
                                                        ไม่มีห้องพัก
                                                    </button>
                                                @else
                                                    {{-- <a href="{{ route('bookingdetail', $item->id) }}"
                                                    class="btn btn-primary btn-sm" type="button">รายละเอียด</a> --}}
                                                    <button class="btn btn-success btn-sm disabled"
                                                        type="button">กรุณาชำระเงินที่หน้าเคาเตอร์ภายในวันที่เข้าพัก</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <footer class="d-flex justify-content-center">
                    {{ $booking->links('pagination::bootstrap-4') }}
                </footer>
            </div>
        </section>
    </div>
@endsection
