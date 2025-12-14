<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Role;
use App\Models\Company;
use App\Models\Cart;

use Hash;

use Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function signup(Request $request){
        $validator = Validator::make($request->all(), [
			'first_name' => 'required',
			'last_name' => 'required',
			'name' => 'required',
			'department' => 'required',
			'vat_no' => 'required',
			'email' => 'required|email|unique:user',
			'email' => 'required|unique:user',
			'password' => 'required|min:8|confirmed',
			'password_confirmation' => 'required',
			'address' => 'required',
			'post_code' => 'required',
			'city' => 'required',
			'state' => 'required',
			'country' => 'required',
		]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone_no;
        $user->role_id  = ($request->type) ? Role::where('name', $request->type)->first()->id : 0;
        $user->password  = Hash::make($request->password);
        $user->status  = 0;
        if($user->save()){
            $company = new Company();
            $company->type = $request->type;
            $company->user_id = $user->id;
            $company->type = $request->type;
            $company->contact_name = $request->first_name.' '.$request->last_name;
            $company->name = $request->name;
            $company->phone_number = $request->phone_no;
            $company->email = $request->email;
            $company->department = $request->department;
            $company->vat_no = $request->vat_no;
            $company->address = $request->address;
            $company->post_code = $request->post_code;
            $company->state = $request->state;
            $company->city = $request->city;
            $company->country = $request->country;
            $company->website_url = $request->website_url;
            $company->status = 0;
            if($company->save()){
                return redirect()->back()->with('message', 'Your registration successfully complete!');
            }else{
                return redirect()->back()->withErrors(['error' => 'Something went wrong.']);
            }
        }else{
            return redirect()->back()->withErrors(['error' => 'Something went wrong.']);
        }
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
			'email' => 'required',
			'password' => 'required',
		]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();

        if ($user && $user->status == 1) {
            if (Auth::attempt($credentials)) {
                if (Session::get('session_id') != null) {
                    $carts = Helper::getCart();
                    if($carts){
                        foreach ($carts as $item) {
                            $cart = Cart::find($item->id);
                            $cart->user_id = Auth::user()->id;
                            $cart->session_id = '';
                            $cart->save();
                        }
                        Session::put('user_id', Auth::user()->id);
                        Session::forget('session_id');
                    }
                }
                // Authentication passed...
                $authUser = Auth()->user()->role_id;

                if ($authUser == 1) {
                    return redirect()->route('admin.index');
                }else{
                    return redirect()->route('admin.index');
                }
            }else{
                return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
            }
        }else{
            return redirect()->back()->withErrors(['error' => 'Your account is not active yet!.']);
        }

    }

    public function logout(Request $request)
	{
        if (Session::get('session_id') != null || Session::forget('user_id') != null) {
            $carts = Helper::getCart();
            if($carts){
                Cart::where(function($query) {
                    $query->where('session_id', Session::get('session_id'))
                    ->orwhere('user_id', Session::get('user_id'));
                })->delete();

                Session::forget('user_id');
                Session::forget('session_id');
            }
        }

		Auth::logout();
		$request->session()->invalidate();
		return redirect()->route('admin');
	}

    public function adminProfile(){
        $user = Auth::user();
        return view('backend.pages.profile.profile', compact('user'));
    }

    public function adminProfileUpdate(Request $request){
        $validator = Validator::make($request->all(), [
			'profile_image' => 'nullable|image:png,jpg,jpeg,gif,webp,',
		]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(Auth::user()->id);
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->phone = $request->phone;
        if($request->hasFile('profile_image')){
            if ($user->profile_image && file_exists(public_path('uploads/user-images/'.$user->profile_image))) {
                unlink(public_path('uploads/user-images/'.$user->profile_image));
            }
            $image = $request->file('profile_image');
            $filename = time().uniqid().$image->getClientOriginalName();
            $image->move(public_path('uploads/user-images'), $filename);
            $user->profile_image = 'uploads/user-images/' . $filename;
        }
        if($user->save()){
            return redirect()->back()->with('success', 'Your profile has been updated.');
        }else{
            return redirect()->back()->withErrors(['error' => 'Something went wrong.']);
        }
    }

    public function adminProfileSetting(){
        $user = Auth::user();
        return view('backend.auth.setting', compact('user'));
    }

    public function adminChangePassword(Request $request){
        $validator = Validator::make($request->all(), [
			'current_password' => 'required',
			'password' => 'required|min:8|confirmed',
			'password_confirmation' => 'required',
		]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find(Auth::user()->id);
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                return redirect()->back()->with('success', 'Password has been changed.');
            }else{
                return redirect()->back()->withErrors(['error' => 'Something went wrong.']);
            }
        }else{
            return redirect()->back()->withErrors(['error' => 'Current password not match.']);
        }
    }
}
