<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\SendCode;

class BusinessRegisterController extends Controller
{
    public function create()
    {
        return view('auth.businessRegister');

    }

    public function store(Request $request)
    {

        $request->validate([
            '*' => 'required',
            'email' => 'required|unique:users',
            'phone' =>'required|unique:users',
        ],[
            'fname.required' => 'The first name field is required.',
            'lname.required' => 'The last name field is required.',
            'shop_address.required' => 'The shop address field is required.',
            'ecommerce_register_id.required' => 'The ecommerce register_id field is required.',
            'fb_page_link.required' => 'The facebook page link field is required.',
            'password_confirmation.required' => 'The password_confirmation field is required.',
        ]);

        $user = User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'image' => 'backend/vertical/assets/images/uploads/default.png',
            'email' => $request->email,
            'shop_address' => $request->shop_address,
            'ecommerce_register_id' => $request->ecommerce_register_id,
            'fb_page_link' => $request->fb_page_link,
            'role' => 4,
            'password' => Hash::make($request->password),

        ]);
        return redirect()->route('login');
        // if($user){
        //     $user->code=SendCode::sendCode($user->phone);
        //     $user->save();
        // }




    }


}
