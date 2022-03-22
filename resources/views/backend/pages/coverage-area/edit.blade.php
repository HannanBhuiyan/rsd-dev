@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div >
            <div class="tile_inner_box">
                <h4 class="header-title mb-4">Edit Area Name</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('coverageArea.index') }}">Area List</a></li>
                      <li class="breadcrumb-item" aria-current="page"><a style="color:#ED1C24; font-weight:700" href="#">Edit Area</a></li>
                    </ol>
                </nav>
                <form method="POST" action="{{ route('coverageArea.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="add_new_parcel_item info-profile add_new_area">
                        <div class="row">
                            <div class="col-xl-8 col-12 m-auto">
                                <div class="card p-5">
                                    <label>District</label>
                                    <select name="district_id">
                                        <option>--Choose One--</option>
                                        @foreach ($districts as $district)
                                            <option  {{ $district->id == $data->district_id ? "selected" : "" }} value="{{ $district->id }}">{{  $district->district_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                        <span class="text-danger mt-2 font-weight-bold">{{ $message }}</span>
                                    @enderror
                                    <label>Area Name</label>
                                    <input type="text" placeholder="Enter Area Name" name="area_name" value="{{ $data->area_name }}">
                                    @error('area_name')
                                        <span class="text-danger mt-2 font-weight-bold">{{ $message }}</span>
                                    @enderror
                                    <label>Area Code</label>
                                    <input type="text" placeholder="Enter Area Code" name="area_code" value="{{ $data->area_code }}">

                                    @error('area_code')
                                        <span class="text-danger mt-2 font-weight-bold">{{ $message }}</span>
                                    @enderror
                                    <div class="add_new_area_btn text-center">
                                        <button type="submit" class="btn btn-danger text-white mt-4" style="background:#ED1C24;">Update Area</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
