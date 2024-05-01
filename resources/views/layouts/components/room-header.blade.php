<div>
    <div class="position-relative">
        <img src="{{ asset('img/index.jpg') }}" alt="อากาศ" class="d-flex w-100 h-100 object-fit-cover">
        <div class="position-absolute top-50 start-50 translate-middle">
            <h1>คานหลาว วิวพอยท์</h1>
            <h1 align="center">ยินดีให้บริการ</h1>
        </div>
    </div>
    {{-- <img src="{{ asset('img/index.jpg') }}" alt="อากาศ" class="crop-img">
    <h1 class="welcome">Welcome</h1>
    <h1 class="descript">คานหลาว วิวพอยท์</h1> --}}
</div>

<nav class="navbar navbar-expand-lg mt-4">
    <div class="container-fluid ">
        <div class="col-1"></div>
        <a class="navbar-brand ms-4" href="{{ route('roomlist') }}">ห้องพักทั้งหมด</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roomtent') }}">เต็นท์กระโจม</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roomhazel') }}">ห้องพัก Hazel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roomholly') }}">ห้องพัก Holly</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
