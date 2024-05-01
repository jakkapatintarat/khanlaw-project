@extends('layouts.admin')
@section('title')
    Edit User
@endsection
@section('style')
    <style>
        body {
            background-color: #dee9ff;
        }

        .registration-form {
            padding: 50px 0;
        }

        .registration-form form {
            background-color: #fff;
            max-width: 600px;
            margin: auto;
            padding: 50px 70px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .form-icon {
            text-align: center;
            background-color: #5891ff;
            border-radius: 50%;
            font-size: 40px;
            color: white;
            width: 100px;
            height: 100px;
            margin: auto;
            margin-bottom: 50px;
            line-height: 100px;
        }

        .registration-form .item {
            border-radius: 20px;
            margin-bottom: 25px;
            padding: 10px 20px;
        }

        .registration-form .create-account {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #5791ff;
            border: none;
            color: white;
            margin-top: 20px;
        }

        .registration-form .social-media {
            max-width: 600px;
            background-color: #fff;
            margin: auto;
            padding: 35px 0;
            text-align: center;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            color: #9fadca;
            border-top: 1px solid #dee9ff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .social-icons a:hover {
            text-decoration: none;
            opacity: 0.6;
        }

        @media (max-width: 576px) {
            .registration-form form {
                padding: 50px 20px;
            }

            .registration-form .form-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
                line-height: 70px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="registration-form">
        <form method="POST" action="{{ route('edituser', $user->id) }}">
            @method('PUT')
            @csrf
            <div class="form-icon">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </span>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" id="username" value="{{ $user->username }}" name="username"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">อีเมล์</label>
                <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="email"
                    disabled>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" id="password" placeholder="password" name="password"
                    value="">
            </div>
            <div class="mb-3">
                <label for="f_name" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" id="f_name" value="{{ $user->f_name }}" name="f_name">
            </div>
            <div class="mb-3">
                <label for="l_name" class="form-label">นามสกุล</label>
                <input type="text" class="form-control" id="l_name" value="{{ $user->l_name }}" name="l_name">
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="sex" class="form-label">เพศ</label>
                    <select class="form-select" id="sex" name="sex">
                        {{ $namesex = $user->sex == 'male' ? 'ชาย' : 'หญิง' }}
                        <option hidden>{{ $namesex }}</option>
                        <option value="male">ชาย</option>
                        <option value="female">หญิง</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="role" class="form-label">ตำแหน่ง :
                        {{ $user->role == 'user' ? 'Member' : 'Admin' }}</label>
                    <select class="form-select" id="role" name="role">
                        <option selected hidden>เลือกตำแหน่ง</option>
                        <option value="user">Member</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">ยืนยัน</button>
        </form>
    </div>
@endsection
