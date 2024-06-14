<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\Booking;
use App\Models\room;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        $booking = Booking::where('status', 'success')->get();
        $total = $booking->sum('total');
        $room = room::all()->count();
        $user = User::where('role', 'user')->count();
        // dd($room);
        return view('page.admin.dashboard', ['total' => $total, 'room' => $room, 'user' => $user]);
    }

    public function createabout(Request $request)
    {
        $about = about::first();
        if (!$about) {
            about::create([
                'content' => $request->content,
            ]);
        } else {
            $about->update([
                'content' => $request->content,
            ]);
        }
        // dd($request);
        return redirect()->route('manage-about');
    }

    public function about()
    {
        $about = about::first();
        return view('page.about', ['about' => $about]);
    }
}
