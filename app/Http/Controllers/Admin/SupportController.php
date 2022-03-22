<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Sudo;

class SupportController extends Controller
{
    public function create()
    {
        return view('backend.pages.support');
    }

    // personal store
    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);
        Support::create([ 
            'auth_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'message'=>$request->message,
        ]);
        return redirect()->back()->with('success', 'Message Send Success');
    }

    public function messageView()
    {
        $messages = Support::orderBy('id', 'desc')->get();
        return view('backend.pages.message.message', compact('messages'));
    }

    public function messageSingleView($id)
    {
        $data = Support::findOrFail($id);
        $data->status = 0;
        $data->save();
        return view('backend.pages.message.messageView', compact('data')); 
    }

    public function messageDelete($id)
    {   
        Support::findOrFail($id)->delete();
        return response()->json();
    }  

}
