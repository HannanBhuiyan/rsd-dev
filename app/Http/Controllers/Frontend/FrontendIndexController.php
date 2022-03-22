<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AreaCost;
use App\Models\Calculation;
use App\Models\CoverageArea;
use App\Models\Parcel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendIndexController extends Controller
{
    public function index()
    {
        $calareas = AreaCost::orderBy('id', 'desc')->get();
        return view('frontend.pages.frontend-home', compact('calareas'));
    }

    public function createAccount()
    {
        return view('frontend.pages.create-account');
    }

    public function findSearchArea(Request $request)
    {

        $request->validate([
            'search' => 'required',
        ]);
        $areas = CoverageArea::where('status', 1)->where('area_name', 'LIKE', '%'.$request->search.'%')
        ->orWhere('area_code', 'LIKE', '%'.$request->search.'%')->get();
        return view('frontend.inc.area-search', compact('areas'));
    }

    public function calculation(Request $request)
    {

        $request->validate([
            'fromarea' => 'required',
            'destination' => 'required',
            'serviceItem' => 'required',
            'weight' => 'required',
        ],[
            'fromarea.required' => 'The from field is required.',
            'destination.required' => 'The destination field is required.',
            'serviceItem.required' => 'The service field is required.',
            'weight.required' => 'The weight field is required.',
        ]);
        $totalCost = ($request->destination * $request->weight) + $request->serviceItem;
        $data = new Calculation();
        $data->fromarea = $request->fromarea;
        $data->destination = $request->destination;
        $data->serviceItem = $request->serviceItem;
        $data->weight = $request->weight;
        $data->totalCost = $totalCost;
        $data->save();
        return response()->json();
    }

    public function calculationTotalCost()
    {
        $totalCost = Calculation::orderBy('id', 'desc')->first();
        return response()->json($totalCost);
    }

    // Terms and condition
    public function termsIndex()
    {
        return view('frontend.pages.terms');
    }

    public function orderTrack(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        if($request->isMethod('get')){
            if(Auth::check()){
                $parcelStatus = Parcel::where('invoice_no', $request->invoice_no)->where('email', $request->email)->first();
                if($parcelStatus){
                    return view('frontend.pages.orderTrackResult', compact('parcelStatus'));   
                }else {
                    return redirect()->back()->with('fail', 'Invoice not found');
                } 
            }else {
                return redirect()->back()->with('fail', 'Please Login');
            }
        }else {
            abort(404);
        }
   
    }

}
