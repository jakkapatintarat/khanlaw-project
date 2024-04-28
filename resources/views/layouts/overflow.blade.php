<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .welcome {
        position: absolute;
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .descript {
        position: absolute;
        top: 35%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .roombtn {
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body style="background-color: #F2F2F2">
    <main>
        <header
            class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom"
            style="background-color: #F2F2F2">

            <div>
                <ul>
                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                    </svg>0650763447
                    <svg class="mx-2 me-2"xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                    </svg>ควนคานหลาว ต.พิจิตร อ.นาหม่อม จ.สงขลา
                </ul>
            </div>

            @auth
                <div class="col-md-3 text-end mx-5">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->username }}
                        </button>
                        <ul class="dropdown-menu">
                            @if (auth()->user()->role === 'admin')
                                <li><a class="dropdown-item" href="{{ route('dashboard') }}">จัดการข้อมูลห้องพัก</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                </div>
            @else
                <div class="col-md-3 text-end">
                    <a type="button" class="btn btn-outline-primary me-2" href="{{ url('login') }}">Login</a>
                    <a type="button" class="btn btn-success me-3" href="{{ url('register') }}">Sign-up</a>
                </div>
            @endauth
        </header>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid ">
                <a class="navbar-brand ms-4" href="">คานหลาว วิวพอยท์</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">หน้าหลัก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">เกี่ยวกับ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('roomlist') }}">รายการห้องพัก</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('bookinghistory') }}">ประวัติการจองห้องพัก</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile') }}">ประวัติส่วนตัว</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>


        <div>
            @yield('content')
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
