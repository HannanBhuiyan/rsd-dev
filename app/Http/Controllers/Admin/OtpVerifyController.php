<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\SendCode;

class OtpVerifyController extends Controller
{
    public function index()
    {
        return view('frontend.pages.verify');
    }

    public function verifyOTP(Request $request)
    {
        $code = $request->code;
        $imp = implode("", $code);
        $final_code = (int)$imp;
        $user = User::where('code', $final_code)->first();
         if($user){
            $user->active = 1;
            $user->code = "";
            $user->save();
            return redirect()->route('login')->withMessage('Your account is active.Please Login');
        }else {
            return back()->withMessage("Verify code is not correct. Please try again");
        }
    }

    public function  resendOTP()
    {
        $phone = User::latest()->first()->phone;
        $code = SendCode::sendCode($phone);
        User::where('phone', $phone)->update([
            'code' => $code,
        ]);
        return back();
    }
}
