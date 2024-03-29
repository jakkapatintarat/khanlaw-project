@extends('layouts.room')
@section('title')
    รายละเอียดห้องที่ {{ $room_detail->number }}
@endsection

@section('content')

    <body style="background-color: #F2F2F2">
        {{-- เกี่ยวกับข้อมูลห้องพัก --}}
        <form action="{{ route('booking', $room_detail->id) }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="card my-3 mx-5">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('storage/images/' . basename($room_detail->image)) }}"
                            class="img-fluid rounded-start">
                    </div>
                    <div class="col">
                        <div class="card-body">

                            <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>รองรับ : {{ $room_detail->maximum }} ท่าน

                            <svg class="me-2 mx-4"xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-cloud-haze2-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8.5 2a5.001 5.001 0 0 1 4.905 4.027A3 3 0 0 1 13 12H3.5A3.5 3.5 0 0 1 .035 9H5.5a.5.5 0 0 0 0-1H.035a3.5 3.5 0 0 1 3.871-2.977A5.001 5.001 0 0 1 8.5 2m-6 8a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zM0 13.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5" />
                            </svg>บรรยากาศ : {{ $room_detail->vibe }}

                            <svg class="me-2 mx-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-rulers" viewBox="0 0 16 16">
                                <path
                                    d="M1 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h5v-1H2v-1h4v-1H4v-1h2v-1H2v-1h4V9H4V8h2V7H2V6h4V2h1v4h1V4h1v2h1V2h1v4h1V4h1v2h1V2h1v4h1V1a1 1 0 0 0-1-1z" />
                            </svg>ความกว้าง : {{ $room_detail->space }} ตร.ม.

                            <div class="card" style="width: 50rem;">
                                <ul class="list-group list-group-flush">

                                    <li class="list-group-item my-2"><svg class="me-3" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-house-heart-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.707L8 2.207 1.354 8.853a.5.5 0 1 1-.708-.707z" />
                                            <path
                                                d="m14 9.293-6-6-6 6V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5zm-6-.811c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018" />
                                        </svg>ห้องพักที่ {{ $room_detail->number }}</li>

                                    <li class="list-group-item my-2"><svg class="me-3" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-calendar2-event"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                                            <path
                                                d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
                                        </svg>Check-in
                                        <input type="date" name="check_in" id="check_in"
                                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                                    </li>

                                    <li class="list-group-item my-2"><svg class="me-3" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-calendar2-event"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                                            <path
                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                                            <path
                                                d="M2.5 4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5z" />
                                        </svg>Check-out
                                        <input type="date" name="check_out" id="check_out">
                                    </li>

                                    <li class="list-group-item my-2"><svg class="me-3" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-person-fill"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                        </svg>เลือกจำนวนคนที่จะเข้าพัก
                                        <input type="radio" name="amount" id="amount" value="1"> : 1
                                        <input type="radio" name="amount" id="amount" value="2"> : 2
                                    </li>
                                </ul>
                                <input type="hidden" name="room_number" id="room_number"
                                    value="{{ $room_detail->number }}">
                                <input type="hidden" name="total" id="total">


                                <div class="card-footer">

                                    <li class="list-group-item my-2"><svg class="me-3" xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-currency-bitcoin"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 13v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.5v1.25c0 .138.112.25.25.25h1a.25.25 0 0 0 .25-.25V13h.084c1.992 0 3.416-1.033 3.416-2.82 0-1.502-1.007-2.323-2.186-2.44v-.088c.97-.242 1.683-.974 1.683-2.19C11.997 3.93 10.847 3 9.092 3H9V1.75a.25.25 0 0 0-.25-.25h-1a.25.25 0 0 0-.25.25V3h-.573V1.75a.25.25 0 0 0-.25-.25H5.75a.25.25 0 0 0-.25.25V3l-1.998.011a.25.25 0 0 0-.25.25v.989c0 .137.11.25.248.25l.755-.005a.75.75 0 0 1 .745.75v5.505a.75.75 0 0 1-.75.75l-.748.011a.25.25 0 0 0-.25.25v1c0 .138.112.25.25.25zm1.427-8.513h1.719c.906 0 1.438.498 1.438 1.312 0 .871-.575 1.362-1.877 1.362h-1.28zm0 4.051h1.84c1.137 0 1.756.58 1.756 1.524 0 .953-.626 1.45-2.158 1.45H6.927z" />
                                        </svg>

                                        <button type="submit" class="btn btn-primary mx-3 px-5" id="price">
                                            {{ $room_detail->price }} บาท
                                        </button>
                                        <span class="badge rounded-pill text-bg-info">
                                            ราคาต่อคืน : {{ $room_detail->price }}
                                        </span>
                                        <br>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script>
            const roomPrice = {{ $room_detail->price }};

            async function updatePrice() {
                const checkInDate = document.getElementById('check_in').value;
                const checkOutDate = document.getElementById('check_out').value;
                const numDays = await Math.floor((new Date(checkOutDate) - new Date(checkInDate)) / (1000 * 60 * 60 * 24));
                const price = numDays * roomPrice;
                // Update button text with formatted price
                document.getElementById('price').textContent = 'ราคารวม :' + price.toFixed(2) + ' บาท/คืน';
                document.getElementById('total').value = price
            }

            // Update price on initial load
            updatePrice();

            // Update price on change of check-in/out date
            document.getElementById('check_in').addEventListener('change', updatePrice);
            document.getElementById('check_out').addEventListener('change', updatePrice);
        </script>


    </body>
@endsection
