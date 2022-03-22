<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AreaCost;
use Illuminate\Http\Request;
use App\Models\CoverageArea;
use App\Models\District;
use Carbon\Carbon;

class CoverageAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = CoverageArea::orderBy('id', 'desc')->get();
        return view('backend.pages.coverage-area.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $districts = District::orderBy('id', 'desc')->get();
        return view('backend.pages.coverage-area.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required',
            'area_name' => 'required|unique:coverage_areas',
            'area_code' => 'required',
        ],[
            'district_id.required' => "Distirict Name is Required",
            'area_name.required' => "Area Name is Required",
            'area_code.required' => "Area Code is Required",
        ]);


        $data = new CoverageArea();
        $data->district_id = $request->district_id;
        $data->area_name = $request->area_name;
        $data->area_code = $request->area_code;
        $data->created_at = Carbon::now();
        $data->save();
        return redirect()->back()->with('success', 'Area Add Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CoverageArea::findOrFail($id);
        $districts = District::orderBy('id', 'desc')->get();
        return view('backend.pages.coverage-area.edit', compact("data", 'districts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'district_id' => 'required',
            'area_name' => 'required',
            'area_code' => 'required',
        ],[
            'district_id.required' => "Distirict Name is Required",
            'area_name.required' => "Area Name is Required",
            'area_code.required' => "Area Code is Required",
        ]);


        $data = CoverageArea::findOrFail($id);
        $data->district_id = $request->district_id;
        $data->area_name = $request->area_name;
        $data->area_code = $request->area_code;
        $data->updated_at = Carbon::now();
        $data->save();
        return redirect()->back()->with('success', 'Area Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function  coverageAreaInactive($id)
    {

        CoverageArea::findOrFail($id)->update(['status' => 0]);
        return back()->with('success', 'Status Inactive');

    }
    public function  coverageAreaActive($id)
    {

        CoverageArea::findOrFail($id)->update(['status' => 1]);
        return back()->with('success', 'Status Active');

    }


    public function  coverageAreaDelete($id)
    {
        $count = AreaCost::where('area_name', $id)->count();
        if($count > 0){
            return redirect()->back();
        }else {
            $data = CoverageArea::findOrFail($id)->delete();
            return response()->json($data);
        }
    }


}
