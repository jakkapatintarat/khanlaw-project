<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function index()
    {
        $content = [
            'subject' => 'Test Subject',
            'body' => 'test bodyyyyyyyyyy',
        ];

        Mail::to('jakkapatintarat92@gmail.com')->send(new SendMail($content));

        return 'Email sent';
    }

    public function booking(Request $request, $id)
    {
        // dd($request);
        $userId = Auth::user()->id;

        $booking = new Booking();

        $booking->user_id = $userId;
        $booking->room_id = $id;
        $booking->check_in = $request->check_in;
        $booking->check_out = $request->check_out;
        $booking->amount = $request->amount;
        $booking->total = $request->total;

        $booking->save();

        $room = room::find($id);
        return view('page.room.booking.check-out', ['booking_data' => $booking, 'room_data' => $room]);
    }

    public function customercheck(Request $request, $booking_id)
    {
        $haveBooking = Customer::where('booking_id', $booking_id)->latest()->first();
        // dd($haveBooking);
        if (!$haveBooking) {
            $customer = new Customer();
            $customer->f_name = $request->f_name;
            $customer->l_name = $request->l_name;
            $customer->tel = $request->tel;
            $customer->email = $request->email;
            $customer->identity_number = $request->identity_number;
            $customer->booking_id = $booking_id;
            $customer->save();

            $booking = Booking::with('room')->with('user')->find($booking_id);

            // ส่งผลสรุปไปที่หน้า result
            return view('page.room.booking.result', ['customer' => $customer, 'booking' => $booking]);
        } else { // ถ้ามีข้อมูลการจองอยู่แล้วให้อัพเดทข้อมูลใหม่เข้าไป
            $haveBooking->update([
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'tel' => $request->tel,
                'email' => $request->email,
                'identity_number' => $request->identity_number,
                'booking_id' => $booking_id,
            ]);
            $booking = Booking::with('room')->with('user')->find($booking_id);
            // dd($haveBooking);
            return view('page.room.booking.result', ['customer' => $haveBooking, 'booking' => $booking]);
        }
    }

    // เมื่อหน้า result กดยืนยันจะต้องส่งเมล์ไปหาอีเมล์ที่กรอกเข้ามา
    public function sendemail(Request $request)
    {
        // dd($request);
        $booking_id = $request->booking_id;
        $customer_id = $request->customer_id;
        // สรุปผล ยืนยัน -> ส่งเมล์ -> history
        $booking = Booking::with('room')->with('user')->find($booking_id);
        $customer = Customer::with('booking')->find($customer_id);
        $email = $request->email;
        // dd($booking);

        // ส่งอีเมล์
        $content = [
            'customer' => 'สวัสดีคุณ ' . $customer->email . ' อีเมล์นี้มาจากระบบจองห้องพัก Khanlaw Viewpoint',
            'check_in' => $booking->check_in,
            'check_out' => $booking->check_out,
            'total' => $booking->total,
            'room_number' => $booking->room->number,
        ];

        Mail::to($email)->send(new SendMail($content));

        return redirect()->route('bookinghistory');
    }

    public function history()
    {
        $userId = Auth::user()->id;
        $booking = Booking::orderby('id', 'desc')->where('user_id', $userId)->paginate(4);

        return view('page.booking-history', ['booking' => $booking,]);
    }

    public function adminbooking()
    {
        $booking = Booking::with('room')->with('user')->orderby('id', 'desc')->get();
        return view('page.admin.manage-booking', ['booking' => $booking]);
    }

    public function adminbookingdetail($id)
    {
        $booking = Booking::where('id', $id)->first();
        $customer = Customer::where('booking_id', $id)->first();
        return view('page.admin.booking-detail', ['booking' => $booking, 'customer' => $customer]);
    }

    // เปลี่ยนสถานะการจอง รอดำเนินการ -> ยืนยัน / ยกเลิก
    public function update_status($id, $status)
    {
        $booking = Booking::find($id);
        // dump($booking);
        $booking->status = $status;
        $booking->save();
        return redirect()->route('managebooking');
    }

    // ค้นหาข้อมูลการจองของวันนั้นๆ
    public function find(Request $request)
    {
        $chckIn = $request->selectDate;
        $booking = Booking::where('check_in', $chckIn)->orderby('id', 'desc')->get();
        // dump($booking);
        return view('page.admin.manage-booking', ['booking' => $booking]);
    }

    // ค้นหาการจองที่ อนุมัติ / ยกเลิก / รอดำเนินการ
    public function find_status_booking($status)
    {
        // ถ้าสถานะเป็นทั้งหมด
        if ($status == 'all') {
            $booking = Booking::with('room')->with('user')->orderby('id', 'desc')->get();
            return redirect()->route('managebooking');
        }
        $booking = Booking::where('status', $status)->orderby('id', 'desc')->get();
        return view('page.admin.manage-booking', ['booking' => $booking]);
    }
}
