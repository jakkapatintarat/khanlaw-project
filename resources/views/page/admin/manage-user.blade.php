@extends('layouts.admin')
@section('title')
    จัดการผู้ใช้
@endsection
@section('content')
    {{-- @php
        dump($users);
    @endphp --}}
    <h1 class="mt-4">จัดการผู้ใช้</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">User Management</li>
    </ol>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="table">
        <thead class="table-light">
            <th>username</th>
            <th>email</th>
            <th>full name</th>
            <th>gender</th>
            <th>role</th>
            <th scope="col"><button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#createUser">เพิ่ม</button></th>
        </thead>
        @foreach ($users as $user)
            <tbody>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->f_name }} {{ $user->l_name }}</td>
                <td>{{ $user->sex == 'male' ? 'ชาย' : 'หญิง' }}</td>
                <td>{{ $user->role == 'user' ? 'Member' : 'Admin' }}</td>
                <td>
                    <a href="{{ route('view-edit-user', $user->id) }}" class="btn btn-warning">แก้ไข</a>
                    <a href="{{ route('delete-user', $user->id) }}" class="btn btn-danger"
                        onclick="return confirm('ต้องการลบ user นี้หรือไม่')">ลบ</a>
                </td>
            </tbody>

        @endforeach
    </table>
    <div class="d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>

    {{-- Modal create user --}}
    <div class="modal fade" id="createUser">
        <div class="modal-dialog">
            <div class="modal-content">


                <!-- Modal Header -->
                <div class="modal-header">
                    <h6>เพิ่มข้อมูลผู้ใช้</h6>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('createuser') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" id="username" placeholder="username" name="username"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">อีเมล์</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="password" placeholder="password"
                                name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="f_name" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="f_name" placeholder="Firstname" name="f_name"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="l_name" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" id="l_name" placeholder="Lastname" name="l_name"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="sex" class="form-label">เพศ</label>
                            <select class="form-select" id="sex" name="sex" required>
                                <option hidden>เลือกเพศ</option>
                                <option value="male">ชาย</option>
                                <option value="female">หญิง</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">ตำแหน่ง</label>
                            <select class="form-select" id="role" name="role" required>
                                <option hidden>เลือกตำแหน่ง</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                </div>
            </div>


        </div>
    </div>
@endsection
