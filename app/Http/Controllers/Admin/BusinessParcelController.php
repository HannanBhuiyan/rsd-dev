<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AreaCost;
use App\Models\Parcel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessParcelController extends Controller
{
    public function create()
    {
        $areas = AreaCost::orderBy('id', 'desc')->get();
        return view('backend.pages.business-parcel.create', compact('areas'));
    }

    public function index()
    {
        $parcelData = Parcel::where('auth_id', Auth::id())->where('role', 4)->orderBy('id', 'desc')->get();
        return view('backend.pages.business-parcel.index', compact('parcelData'));
    }

    public function businessParcelPost(Request $request){
        $request->validate([
            '*' => 'required',
        ],[
            'recipientAdd.required' => 'Address Field is required',
            'recipientnote.required' => 'Note is required',
            'recipientName.required' => 'The Recipient Name field is required.',
            'recipientPhone.required' => 'The Recipient Phone field is required.',
        ]);

        $invoiceNo = "BDT".rand(100000,999999);
        $data = new Parcel();
        $data->auth_id = Auth::id();
        $data->email = Auth::user()->email;
        $data->role = 4;
        $data->fromarea = $request->fromarea;
        $data->toarea = $request->toarea;
        $data->weight = $request->weight;
        $data->PorductitemName = $request->PorductitemName;
        $data->recipientName = $request->recipientName;
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


    public function viewBusinessParcel($id)
    {
        $data = Parcel::findOrFail($id);
        return view('backend.pages.business-parcel.view', compact('data'));
    }

    // Delete method parcel
    public function businessParcelDelete($id)
    {
 
        Parcel::findOrFail($id)->update(['delete_id' => 4]);
        Parcel::findOrFail($id)->delete();
        return response()->json();
    }

    public function businessTrashParcelIndex()
    {
        $parcelData = Parcel::where('auth_id', Auth::id())->where('delete_id', 4)->onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.pages.business-parcel.trash', compact('parcelData'));
    }

    public function  personalParcelRestore($id)
    { 
        Parcel::withTrashed()->findOrFail($id)->update(['delete_id' => 0]);
        Parcel::withTrashed()->findOrFail($id)->restore();
        return response()->json();
    }

    public function businessParcelPermanentDelete($id)
    {
        Parcel::withTrashed()->findOrFail($id)->forceDelete();
        return response()->json();
    }

}
