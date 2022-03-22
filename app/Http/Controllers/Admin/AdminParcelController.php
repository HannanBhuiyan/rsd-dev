<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Parcel;
class AdminParcelController extends Controller
{
    public function paymentindex()
    {
        $parcels = Parcel::orderBy('id', 'desc')->get();
        return view('backend.pages.viewPayment', compact('parcels'));
    }

    public function adminSinglePersonalParcel($id)
    {
        $data = Parcel::findOrFail($id);
        return view('backend.pages.adminSinglePersonalParcelView', compact('data'));
    }

    public function personalAllParcel()
    {

        $personalParcelData = Parcel::where('role', 5)->orderBy('id', 'desc')->get();
        return view('backend.pages.viewAllPersonalParcel', compact('personalParcelData'));
    }


    public function personalSingleParcelView($id){
        $data = Parcel::findOrFail($id);
        return view('backend.pages.personal-parcel.view', compact('data'));
    }
    public function adminSingleBusinessParcelView($id){
        $data = Parcel::findOrFail($id);
        return view('backend.pages.adminSingleBusinessParcelview', compact('data'));
    }

    // ================= Personal parcel pending
    public function personalParcelPicked($id)
    {
         Parcel::findOrFail($id)->update(['status' => 'picked']);
         return back();
     }
 
 
    // Personal parcel delivery
    public function personalParcelDelivery($id)
    {
        Parcel::findOrFail($id)->update(['status' => 'delivery']);
        return back();
    }

    // Personal parcel cancel
    public function personalParcelCancel($id)
    {
        Parcel::findOrFail($id)->update(['status' => 'cancel']);
        return back();
    }

    // deleted method admin
    public function adminParcelDelete($id)
    {
        Parcel::findOrFail($id)->update(['delete_id' => 1]);
        Parcel::findOrFail($id)->delete();
        return response()->json();
    }

    public function adminTrashParcelIndex()
    {
        $parcelData = Parcel::where('delete_id', 1)->onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.pages.admin-trash', compact('parcelData'));
    }
    // business parcel 
    public function marchentAllParcel()
    {
        $businessParcelData = Parcel::where('role', 4)->orderBy('id', 'desc')->get();
        return view('backend.pages.viewAllBusinesslParcel', compact('businessParcelData'));
    }  
}
