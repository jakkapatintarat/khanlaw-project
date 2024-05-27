@extends('layouts.admin')
@section('title')
    รายละเอียดการจองที่ {{ $booking->id }}
@endsection
@section('content')
    <?php
    $checkIn = new DateTime($booking->check_in);
    $checkOut = new DateTime($booking->check_out);
    ?>
    <h1 class="mt-4">รายละเอียดการจอง</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Booking</li>
        <li class="breadcrumb-item active"># {{ $booking->id }}</li>
    </ol>
    <section style="background-color: #eee;">
        <div class="container py-5">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $customer->f_name }} {{ $customer->l_name }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ชื่อเต็ม</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $customer->f_name }} {{ $customer->l_name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">เบอร์โทรศัพท์</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $customer->tel }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">หมายเลขบัตรประชาชน</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $customer->identity_number }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">อีเมล์</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $customer->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ผู้จอง</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $booking->user->username }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">ห้องพัก</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $booking->room->number }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">เช็คอิน</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ date_format($checkIn, 'd/m/Y') }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">เช็คเอาท์</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ date_format($checkOut, 'd/m/Y') }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">เข้าพัก</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $booking->amount }} ท่าน</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">ราคา</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">฿ {{ $booking->total }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
