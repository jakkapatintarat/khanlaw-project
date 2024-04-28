@extends('layouts.overflow')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="container text-center mt-5" style="border: 0">
        <div class="row align-items-start">
            <div class="col">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-house-add me-2" viewBox="0 0 16 16">
                    <path
                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h4a.5.5 0 1 0 0-1h-4a.5.5 0 0 1-.5-.5V7.207l5-5 6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                    <path
                        d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 1 0 1 0v-1h1a.5.5 0 1 0 0-1h-1v-1a.5.5 0 0 0-.5-.5" />
                </svg>หมายเลขห้อง : {{ $room_data->number }}
            </div>
            <div class="col">
                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>รองรับ : {{ $room_data->maximum }} ท่าน
            </div>
            <div class="col">
                <svg class="me-2 mx-4"xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-cloud-haze2-fill" viewBox="0 0 16 16">
                    <path
                        d="M8.5 2a5.001 5.001 0 0 1 4.905 4.027A3 3 0 0 1 13 12H3.5A3.5 3.5 0 0 1 .035 9H5.5a.5.5 0 0 0 0-1H.035a3.5 3.5 0 0 1 3.871-2.977A5.001 5.001 0 0 1 8.5 2m-6 8a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zM0 13.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5" />
                </svg>บรรยากาศ : {{ $room_data->vibe }}
            </div>
            <div class="col">
                <svg class="me-2 mx-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-rulers" viewBox="0 0 16 16">
                    <path
                        d="M1 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h5v-1H2v-1h4v-1H4v-1h2v-1H2v-1h4V9H4V8h2V7H2V6h4V2h1v4h1V4h1v2h1V2h1v4h1V4h1v2h1V2h1v4h1V1a1 1 0 0 0-1-1z" />
                </svg>ความกว้าง : {{ $room_data->space }} ตร.ม.
            </div>
        </div>
    </div>

    <?php
    $timezone = new DateTimeZone('UTC');
    $check_in = date_create($booking_data->check_in, $timezone);
    $check_out = date_create($booking_data->check_out, $timezone);
    ?>
    <div class="container-fluid text-center mt-4" style="border: 0">
        <div class="row">
            <div class="col">
                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-calendar2-event" viewBox="0 0 16 16">
                    <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
                </svg>Check-in {{ date_format($check_in, 'd/m/Y') }}
            </div>
            <div class="col">
                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-calendar2-event" viewBox="0 0 16 16">
                    <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                    <path d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
                </svg>Check-out {{ date_format($check_out, 'd/m/Y') }}
            </div>
            <div class="col">
                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>จำนวนผู้เข้าพัก {{ $booking_data->amount }}
            </div>
            <div class="col">
                <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-currency-bitcoin" viewBox="0 0 16 16">
                    <path
                        d="M5.5 13v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.5v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.084c1.992 0 3.416-1.033 3.416-2.82 0-1.502-1.007-2.323-2.186-2.44v-.088c.97-.242 1.683-.974 1.683-2.19C11.997 3.93 10.847 3 9.092 3H9V1.75a.25.25 0 0 0-.25-.25h-1a.25.25 0 0 0-.25.25V3h-.573V1.75a.25.25 0 0 0-.25-.25H5.75a.25.25 0 0 0-.25.25V3l-1.998.011a.25.25 0 0 0-.25.25v.989c0 .137.11.25.248.25l.755-.005a.75.75 0 0 1 .745.75v5.505a.75.75 0 0 1-.75.75l-.748.011a.25.25 0 0 0-.25.25v1c0 .138.112.25.25.25zm1.427-8.513h1.719c.906 0 1.438.498 1.438 1.312 0 .871-.575 1.362-1.877 1.362h-1.28zm0 4.051h1.84c1.137 0 1.756.58 1.756 1.524 0 .953-.626 1.45-2.158 1.45H6.927z" />
                </svg>
                <span class="badge rounded-pill text-bg-success fs-6">ราคา {{ $booking_data->total }} บาท</span>
            </div>
        </div>
    </div>


    <div class="container mt-5 my-5">
        <main class="w-100 m-auto">

            <form action="{{ route('customercheck', $booking_data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <ins class="h5 mb-3 fw-narmal">กรอกข้อมูลผู้เข้าพัก</ins>
                <!--ส่วนของชื่อ-->
                <div class="form-floating mt-4">
                    <input type="text" class="form-control" id="f_name" name="f_name" placeholder="firstname"
                        required>
                    <label for="name">กรอกชื่อของคุณ</label>
                </div>
                <!--ส่วนของนามสกุล-->
                <div class="form-floating mt-4">
                    <input type="text" class="form-control" id="l_name" name="l_name" placeholder="lastname"
                        required>
                    <label for="lname">กรอกนามสกุลของคุณ</label>
                </div>
                <!--ส่วนของเลขบัตรประชาชน-->
                <div class="form-floating mt-4">
                    <input type="number" class="form-control" id="identity_number" name="identity_number"
                        placeholder="identity" required>
                    <label for="identity_number">กรอกเลขบัตรประชาชน</label>
                </div>
                <!--ส่วนของ tel-->
                <div class="form-floating mt-4">
                    <input type="number" class="form-control" id="tel" name="tel" placeholder="number"
                        required>
                    <label for="tel">กรอกเบอร์โทรศัพท์ของคุณ</label>
                </div>
                <!--ส่วนของ e-mail-->
                <div class="form-floating mt-4">
                    <input type="email" class="form-control" id="email" name="email" placeholder="email"
                        required>
                    <label for="email">กรอกอีเมล</label>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-4" id="button-addon2">ยืนยัน</button>

                {{-- <button type="button" class="btn btn-primary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#myModal">
                ยืนยัน</button> --}}
            </form>
        </main>
    </div>
@endsection
