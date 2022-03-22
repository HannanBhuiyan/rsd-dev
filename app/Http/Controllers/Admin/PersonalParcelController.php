<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AreaCost;
use App\Models\CoverageArea;
use App\Models\Parcel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PersonalParcelController extends Controller
{

    public function create()
    {
        $areas = AreaCost::orderBy('area_name', 'asc')->get();
        return view('backend.pages.personal-parcel.create', compact('areas'));
    }

    public function index()
    {
        $parcelData = Parcel::where('auth_id', Auth::id())->where('role', 5)->orderBy('id', 'desc')->get();
        return view('backend.pages.personal-parcel.index', compact('parcelData'));
    }

    public function parcelPost(Request $request){
        $request->validate([
            '*' => 'required',
        ],[
            'fromarea.required' => 'From Area Field is required',
            'toarea.required' => 'To Area Field is required',
            'PorductitemName.required' => 'Product Type Field is required',
            'recipientAdd.required' => 'Address Field is required',
            'recipientnote.required' => 'Note is required',
            'recipientName.required' => 'The Recipient Name field is required.',
            'recipientPhone.required' => 'The Recipient Phone field is required.',
        ]);

        $invoiceNo = "BDT".rand(100000,999999);
        $data = new Parcel();
        $data->auth_id = Auth::id();
        $data->email = Auth::user()->email;
        $data->role = 5;
        $data->fromarea = $request->fromarea;
        $data->toarea = $request->toarea;
        $data->weight = $request->weight;
        $data->PorductitemName = $request->PorductitemName;
        $data->recipientName = $request->recipientName;
        $data->recipientPhone = $request->recipientPhone;
        $data->recipientPhone = $request->recipientPhone;
        $data->recipientAdd = $request->recipientAdd;
        $data->recipientnote = $request->recipientnote;
        $data->invoice_no = $invoiceNo;
        $data->totalcosts = $request->totalcosts;
        $data->month = Carbon::now()->locale('dhaka')->monthName;
        $data->created_at = Carbon::now()->format('Y-m-d');
        $data->save();
        return redirect()->back()->with('success', 'Parcel Send Success');
    }

    // =================== Personal page method start ===================

    // Delete method parcel
    public function parcelDelete($id)
    {

        Parcel::findOrFail($id)->update(['delete_id' => 5]);
        Parcel::findOrFail($id)->delete();
        return response()->json();
    }

    public function trashParcelIndex()
    {
        $parcelData = Parcel::where('auth_id', Auth::id())->where('delete_id', 5)->onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.pages.personal-parcel.trash', compact('parcelData'));
    }

    public function personalParcelRestore($id)
    { 
        Parcel::withTrashed()->findOrFail($id)->update(['delete_id' => 0]);
        Parcel::withTrashed()->findOrFail($id)->restore();
        return response()->json();
    }
    
    public function personalParcelPermanentDelete($id)
    {
        Parcel::withTrashed()->findOrFail($id)->forceDelete();
        return response()->json();
    }
    // =================== Personal page method end ===================
}
