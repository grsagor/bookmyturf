<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Skill;
use App\Models\Slot;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index()
    {
        $dates = [];
        for ($i = 0; $i < 7; $i++) {
            $dates[] = date('Y-m-d', strtotime("+$i days"));
        }
        $defaultDate = $dates[0];

        $slots = Slot::all();

        foreach ($slots as $slot) {
            $order = Order::where([['slot_id', $slot->id], ['date', $defaultDate]])->first();
            $slot->booked = $order ? true : false;
        }

        $data = [
            'dates' => $dates,
            'slots' => $slots,
            'defaultDate' => $defaultDate,
        ];
        return view('front.pages.home.index', $data);
    }
    public function getSlots(Request $request)
    {
        $date = $request->input('date');
        $slots = Slot::all();


        foreach ($slots as $slot) {
            $order = Order::where([['slot_id', $slot->id], ['date', $date]])->first();
            $slot->booked = $order ? true : false;
        }
        $for = $request->for;
        $html = view('front.pages.home.sections.slot-tbody', compact('slots', 'for'))->render();
        return response()->json([
            'success' => true,
            'html' => $html
        ]);
    }
    public function bookSlot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slot_id' => 'required|integer',
            'date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $slotId = $request->input('slot_id');
        $date = $request->input('date');

        $slot = Slot::find($slotId);
        if (!$slot) {
            return response()->json(['error' => 'Slot not found'], 404);
        }

        Session::put(['slot_id' => $slotId, 'date' => $date]);

        return response()->json(['success' => true, 'redirect_url' => route('front.checkout')]);
    }
    public function about()
    {
        return view('front.pages.about.index');
    }
    public function bookings()
    {
        $dates = [];
        for ($i = 0; $i < 7; $i++) {
            $dates[] = date('Y-m-d', strtotime("+$i days"));
        }
        $defaultDate = $dates[0];

        $slots = Slot::all();

        foreach ($slots as $slot) {
            $order = Order::where([['slot_id', $slot->id], ['date', $defaultDate]])->first();
            $slot->booked = $order ? true : false;
        }

        $data = [
            'dates' => $dates,
            'slots' => $slots,
            'defaultDate' => $defaultDate,
        ];
        return view('front.pages.bookings.index', $data);
    }

    public function gallery()
    {
        $images = [
            [
                'thumb' => asset('assets/images/gallery/gallery-1.webp'),
                'full' => asset('assets/images/gallery/gallery-1.webp'),
                'title' => 'Event 1',
                'description' => 'A great moment from Event 1.'
            ],
            [
                'thumb' => asset('assets/images/gallery/gallery-2.webp'),
                'full' => asset('assets/images/gallery/gallery-2.webp'),
                'title' => 'Event 2',
                'description' => 'A great moment from Event 2.'
            ],
            [
                'thumb' => asset('assets/images/gallery/gallery-3.webp'),
                'full' => asset('assets/images/gallery/gallery-3.webp'),
                'title' => 'Event 3',
                'description' => 'A great moment from Event 3.'
            ],
            [
                'thumb' => asset('assets/images/gallery/gallery-4.webp'),
                'full' => asset('assets/images/gallery/gallery-4.webp'),
                'title' => 'Event 4',
                'description' => 'A great moment from Event 4.'
            ],
            [
                'thumb' => asset('assets/images/gallery/gallery-5.webp'),
                'full' => asset('assets/images/gallery/gallery-5.webp'),
                'title' => 'Event 5',
                'description' => 'A great moment from Event 5.'
            ],
            [
                'thumb' => asset('assets/images/gallery/gallery-6.webp'),
                'full' => asset('assets/images/gallery/gallery-6.webp'),
                'title' => 'Event 6',
                'description' => 'A great moment from Event 6.'
            ],
            [
                'thumb' => asset('assets/images/gallery/gallery-7.webp'),
                'full' => asset('assets/images/gallery/gallery-7.webp'),
                'title' => 'Event 7',
                'description' => 'A great moment from Event 7.'
            ],
            [
                'thumb' => asset('assets/images/gallery/gallery-8.webp'),
                'full' => asset('assets/images/gallery/gallery-8.webp'),
                'title' => 'Event 8',
                'description' => 'A great moment from Event 8.'
            ],
            [
                'thumb' => asset('assets/images/gallery/gallery-9.webp'),
                'full' => asset('assets/images/gallery/gallery-9.webp'),
                'title' => 'Event 9',
                'description' => 'A great moment from Event 9.'
            ],
        ];

        return view('front.pages.gallery.index', compact('images'));
    }
    public function contact()
    {
        return view('front.pages.contact.index');
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Handle email or save logic here

        return redirect()->route('front.contact')->with('success', 'Message sent successfully!');
    }
    public function registration()
    {
        App::setLocale(Session::get('language'));
        return view('auth.registration');
    }

    public function login()
    {
        App::setLocale(Session::get('language'));
        return view('auth.login');
    }

    public function forgotPassword()
    {
        App::setLocale(Session::get('language'));
        return view('auth.forgotPassword');
    }

    public function resetOtpSend(Request $request)
    {

        if (User::where('email', $request->email)->exists()) {
            $email = $request->email;
            $otps = random_int(100000, 999999);
            $subject = 'Password Reset';
            $data['user'] = User::where('email', $request->email)->first();
            $data['otp'] = $otps;
            $data['message'] = 'Your confirmation code is below — enter it in your open browser window and we will help you get changed password. Please do not share the code others';
            Helper::sendEmail($email, $subject, $data, 'resetpassword');

            $otp = new Otp();
            $otp->email = $request->email;
            $otp->otp = $otps;
            $otp->save();

            return view('auth.otp', compact('email'));
        } else {
            return redirect()->back()->withErrors(['message' => 'There is no account with this email!']);
        }
    }

    public function otp(Request $request)
    {
        App::setLocale(Session::get('language'));
        if ($request->email && $request->otp) {
            Validator::make($request->all(), [
                'email' => 'required',
                'otp' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required_with:password|same:password|min:6',
            ]);

            if (Helper::checkotp($request->email, $request->otp)) {
                $email = $request->email;
                $user = User::where('email', $request->email)->first();
                $user->password = Hash::make($request->password);
                if ($user->save()) {
                    $otp = Otp::where('email', $request->email)->where('otp', $request->otp)->first();
                    $otp->status = 1;
                    $otp->save();
                    return redirect()->route('admin')->with(['message' => 'Password changed successfully!']);
                } else {
                    return view('auth.otp', compact('email'))->with(['message' => 'OTP invalid or expaired!']);
                }
            } else {
                return view('auth.otp', compact('email'))->with(['message' => 'OTP invalid or expaired!']);
            }
        } else {
            return view('auth.otp');
        }
    }

    public function changeLanguage(Request $request)
    {
        $language = $request->input('language');
        Session::put('language', $language);
        return true;
    }

    public function catchAll()
    {
        return view('frontend.pages.error');
    }
}
