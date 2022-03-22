@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div >
            <div class="tile_inner_box">
                <h4 class="header-title mb-4">Add District</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('coverageDistrict.index') }}">District</a></li>
                      <li class="breadcrumb-item" aria-current="page"><a style="color:#ED1C24; font-weight:700" href="#">Add District</a></li>
                    </ol>
                </nav>
                <form method="POST" action="{{ route('coverageDistrict.store') }}">
                    @csrf
                    <div class="add_new_parcel_item info-profile add_new_area">
                        <div class="row">
                            <div class="col-xl-8 col-12 m-auto">
                                <div class="card p-5">
                                    <label>District Name</label>
                                    <input type="text" placeholder="Enter District Name" name="district_name" value="{{ old('district') }}">

                                    @error('district_name')
                                        <span class="text-danger mt-2 font-weight-bold">{{ $message }}</span>
                                    @enderror

                                    <div class="add_new_area_btn text-center">
                                        <button type="submit" class="btn btn-danger text-white mt-4" style="background:#ED1C24;">Add District</a>
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
