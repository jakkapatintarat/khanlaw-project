@extends('layouts.room')
@section('title')
    ห้องพัก Hazel
@endsection
@section('content')

    <body style="background-color: #F2F2F2">
        <div class="container page-center">
            <div class="row">
                @foreach ($rooms as $room)
                    <div class="col">
                        <div class="card mt-3" style="width: 30rem;">
                            <img src="{{ asset('storage/images/' . basename($room->image)) }}" class="card-img-top"
                                alt="{{ $room->type }}" width="640px" height="480px" style="object-fit: contain">
                            <div class="card-body">
                                <h5 class="card-title border-bottom">ห้องพักที่ {{ $room->number }}</h5>
                            </div>
                            <ul>
                                <li class="list-group-item">
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>รองรับ : {{ $room->maximum }} ท่าน
                                </li>

                                <li class="list-group-item">
                                    <svg class="me-2"xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-cloud-haze2-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8.5 2a5.001 5.001 0 0 1 4.905 4.027A3 3 0 0 1 13 12H3.5A3.5 3.5 0 0 1 .035 9H5.5a.5.5 0 0 0 0-1H.035a3.5 3.5 0 0 1 3.871-2.977A5.001 5.001 0 0 1 8.5 2m-6 8a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zM0 13.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5" />
                                    </svg>บรรยากาศ : {{ $room->vibe }}
                                </li>

                                <li class="list-group-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-rulers" viewBox="0 0 16 16">
                                        <path
                                            d="M1 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h5v-1H2v-1h4v-1H4v-1h2v-1H2v-1h4V9H4V8h2V7H2V6h4V2h1v4h1V4h1v2h1V2h1v4h1V4h1v2h1V2h1v4h1V1a1 1 0 0 0-1-1z" />
                                    </svg>ความกว้าง : {{ $room->space }} ตร.ม.
                                </li>

                            </ul>
                            <div class="card-body">
                                <a type="button" href="{{ route('roomdetail', $room->id) }}"
                                    class="btn btn-primary me-3">ราคา {{ $room->price }}
                                    บาท/คืน</a>
                                <a href="{{ route('about') }}" class="card-link">ดูรายละเอียด</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- btn เลือกหน้า --}}
        <footer class="d-flex justify-content-center">
            {{ $rooms->links('pagination::bootstrap-4') }}
        </footer>
    </body>
@endsection
