<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;

class RoleManageMentController extends Controller
{
    public function allUserData()
    {
        $userData = User::where('active', 1)->where('role', 5)->orderBy('id', 'desc')->get();
        return view('backend.pages.role-management.allUser', compact('userData'));
    }

    public function allbanned()
    {
        $banneRoledData = User::where('active', 0)->orderBy('id', 'desc')->get();
        return view('backend.pages.role-management.allbannedRole', compact('banneRoledData'));
    }

    public function allMerchantData()
    {
        $merchantData = User::where('active', 1)->where('role', 4)->orderBy('id', 'desc')->get();
        return view('backend.pages.role-management.allmarchent', compact('merchantData'));
    }

    public function allAdminData()
    {
        $adminData = User::where('active', 1)->where('role', 1)->orderBy('id', 'desc')->get();
        return view('backend.pages.role-management.all-admin', compact('adminData'));
    }

    public function allEditorData()
    {
        $editorData = User::where('active', 1)->where('role', 3)->orderBy('id', 'desc')->get();
        return view('backend.pages.role-management.all-editor', compact('editorData'));
    }

 
    public function editorRole($id)
    {
        User::findOrFail($id)->update([
            'role' => 3,
        ]);
        return redirect()->back()->with('success', 'Role Change Success');
    }

    public function adminRole($id)
    {
        User::findOrFail($id)->update([
            'role' => 1,
        ]);
        return redirect()->back()->with('success', 'Role Change Success');
    }

    public function userRole($id)
    {
        User::findOrFail($id)->update([
            'role' => 5,
        ]);
        return redirect()->back()->with('success', 'Role Change Success');
    }

    public function merchantRole($id)
    {
        User::findOrFail($id)->update([
            'role' => 4,
        ]);
        return redirect()->back()->with('success', 'Role Change Success');
    }

    public function banned($id)
    {
        User::findOrFail($id)->update(['active' => 0]);
        return redirect()->back()->with('success', 'Role Banned Success');
    }

    
    public function bannedActive($id)
    {
        User::findOrFail($id)->update(['active' => 1]);
        return redirect()->back()->with('success', 'Role Active Success');
    }

    public function roleDelete($id)
    {
        User::findOrFail($id)->delete();
        return response()->json();
    }
}
