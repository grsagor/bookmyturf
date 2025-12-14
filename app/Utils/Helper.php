<?php // Code within app\Helpers\Helper.php

namespace App\Utils;

use App\Models\Right;
use App\Models\RoleRight;
use App\Models\Setting;
use App\Models\Otp;
use Illuminate\Support\Facades\Auth;

class Helper
{
    public static function hasRight($right, $role_id = null)
    {
        return true;
        if ($role_id != null) {
            $role = $role_id;
        } else {
            $role = Auth::user()->role_id;
        }
        $right = Right::where('name', $right)->first();
        if ($right && RoleRight::where('role_id', $role)->where('right_id', $right->id)->where('permission', 1)->exists()) {
            return true;
        } else {
            return false;
        }
    }

    public static function getSettings($key)
    {
        $settings = Setting::where('key', $key)->first();
        if (!is_null($settings)) {
            return $settings->value;
        } else {
            return false;
        }
    }


    public static function sendEmail($email, $subject, $data, $template = 'default')
    {
        Mail::send('mails.' . $template, ['data' => $data], function ($message) use ($email, $subject) {
            $message->from(env('MAIL_FROM_ADDRESS'), $subject);
            $message->to($email)->subject($subject);
        });
    }

    public static function checkotp($email, $otp)
    {
        $otp = Otp::where('email', $email)->where('otp', $otp)->where('status', 0)->first();
        if ($otp) {
            return true;
        }
    }
}
