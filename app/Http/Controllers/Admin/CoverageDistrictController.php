<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CoverageArea;
use Illuminate\Http\Request;
use App\Models\District;
use Carbon\Carbon;
class CoverageDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::orderBy('id', 'desc')->get();

        return view('backend.pages.coverage-dist.index', compact('districts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.pages.coverage-dist.create');
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
            'district_name' => 'required|unique:districts',
        ],[
            'district_name.required' => "Distirict Name is Required",
        ]);

        $data = new District();
        $data->district_name = $request->district_name;
        $data->created_at = Carbon::now();
        $data->save();
        return redirect()->back()->with('success', 'District Add Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = District::findOrFail($id);
        return view('backend.pages.coverage-dist.edit', compact("data"));
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
            'district_name' => 'required|unique:districts',
        ],[
            'district_name.required' => "Distirict Name is Required",
        ]);

        $data = District::findOrFail($id);
        $data->district_name = $request->district_name;
        $data->updated_at = Carbon::now();
        $data->save();
        return redirect()->route('coverageDistrict.index')->with('success', 'District Update Success');
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

  
    public function  coverageDistrictDelete($id)
    {

        $count = CoverageArea::where('district_id', $id)->count();
        if($count > 0){
            return redirect()->back();
        }
        else {
            $data = District::findOrFail($id)->delete();
            return response()->json($data);
        }
    }

}
