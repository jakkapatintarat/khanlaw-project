<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderby('role', 'desc')->orderby('id', 'desc')->paginate(10);
        return view('page.admin.manage-user', ['users' => $users]);
    }

    /**
     * สร้าง user ใหม่
     */
    public function createuser(Request $request)
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'f_name' => ['required', 'string'],
            'l_name' => ['required', 'string'],
            'sex' => ['required'],
        ]);

        User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'sex' => $data['sex'],
            'role' => 'user',
        ]);

        return redirect()->route('manage-user');
    }

    /**
     * Display the specified resource.
     */
    public function profile()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        return view('page.profile', ['user' => $user]);
    }

    public function updateprofile(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        if ($request->password != null) {
            $user->update([
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'sex' => $request->sex,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $user->update([
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'sex' => $request->sex,
            ]);
        }
        return redirect()->route('profile');
    }

    public function view_edit_user($user_id)
    {
        $user = User::where('id', $user_id)->first();
        return view('page.admin.user-edit', ['user' => $user]);
    }
    /**
     * แก้ไขผู้ใช้
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        if ($request->password != null) {
            $user = User::find($id);
            $user->update([
                'password' => Hash::make($request->password),
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'sex' => $request->sex,
                'role' => $request->role,
            ]);
        } else {
            $user = User::find($id);
            $user->update([
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'sex' => $request->sex,
                'role' => $request->role,
            ]);
        }
        return redirect()->route('manage-user');
    }

    /**
     * ลบผู้ใช้งาน
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('manage-user');
    }
}
