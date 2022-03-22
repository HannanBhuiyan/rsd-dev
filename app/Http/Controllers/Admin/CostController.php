<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AreaCost;
use App\Models\CoverageArea;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $costs = AreaCost::orderBy('id', 'desc')->get();
        return view('backend.pages.area-cost.index', compact('costs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = CoverageArea::orderBy('id', 'desc')->get();
        return view('backend.pages.area-cost.create', compact('areas'));
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
            'area_name' => 'required|unique:area_costs',
            'cost' => 'required|numeric',
        ]);
        AreaCost::create($request->except('_token'));
        return redirect()->back()->with('success', 'Area Cost Add Success');
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
        $data = AreaCost::findOrFail($id);
        $areas = CoverageArea::orderBy('id', 'desc')->get();
        return view('backend.pages.area-cost.edit', compact('data', 'areas'));
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
            'area_name' => 'required',
            'cost' => 'required|numeric',
        ]);

        AreaCost::findOrFail($id)->update($request->except('_token'));
        return redirect()->back()->with('success', 'Area Cost Update Success');
    }

    public function costDelete($id)
    {
        AreaCost::findOrFail($id)->delete();
        return response()->json();
    }
}
