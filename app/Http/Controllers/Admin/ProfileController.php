<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{

    public function profileView()
    {
        return view('backend.pages.profile');
    }

    // Front end number edit
    public function editPhone(Request $request, $id)
    {

        $user = User::findOrFail($id)->update([
            'phone' => $request->phone,
        ]);
        $user = User::where('id',$id)->pluck('phone');
        return response()->json($user);
    }

    // Profile view
    public function profileEdit()
    {
        return view('backend.pages.edit-profile');
    }

    //Profile update settings
    public function updateProfile(Request $request) {

        $image = $request->file('image');
        if($image != ""){
            if(Auth::user()->image != 'backend/vertical/assets/images/uploads/default.png'){
                if(file_exists($request->old_image)){
                    unlink($request->old_image);
                }
            }
            $imag_ext = $image->getClientOriginalExtension();
            $hexCode = hexdec(uniqid());
            $full_name = $hexCode.'.'.$imag_ext;
            $upload_location = 'backend/vertical/assets/images/uploads/profile/';
            $last_image = $upload_location.$full_name;
            Image::make($image)->resize(300, 300)->save($last_image);
            User::findOrFail(Auth::id())->update([
                'image' => $last_image,
            ]);
        }
        User::findOrFail(Auth::id())->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        return redirect()->route('view.profile')->with('success', 'Profile Update success');
    }

    // Change password
    public function PasswordView(){
        return view("backend.pages.view-password");
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ],[
            'old_password.required' => 'The old Password Required.',
            'new_password.required' => 'The New Password Required.',
            'confirm_password.required' => 'The Confirm Password Required.',
        ]);
        if(Hash::check($request->current_password, Auth::user()->password)){
            if($request->confirm_password == $request->new_password){
                User::findOrFail(Auth::id())->update([
                    'password' => Hash::make($request->new_password),
                ]);
                Auth::logout();
                return redirect()->route('login');
            }else {
                return redirect()->back()->with('fail', 'New Password and Confirm Password are not metch !');
            }
        }
        else {
            return back()->with('fail', 'Old Password and current password are not match');
        }
    }
}

