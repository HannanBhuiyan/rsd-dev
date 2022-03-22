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
                      <li class="breadcrumb-item"><a href="{{ route('cost.index') }}">All Cost</a></li>
                      <li class="breadcrumb-item" aria-current="page"><a style="color:#ED1C24; font-weight:700" href="#">Add Cost</a></li>
                    </ol>
                </nav>
                <form method="POST" action="{{ route('cost.store') }}">
                    @csrf
                    <div class="add_new_parcel_item info-profile add_new_area">
                        <div class="row">
                            <div class="col-xl-8 col-12 m-auto">
                                <div class="card p-5">
                                    <label>Area Name</label>
                                    <select name="area_name">
                                        <option value>--Choose Area--</option>
                                        @foreach ($areas as $area)
                                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_name')
                                        <span class="text-danger mt-2 font-weight-bold">{{ $message }}</span>
                                    @enderror
                                    <label>Cost</label>
                                    <input type="number" name="cost" placeholder="Tk" class="form-control">
                                    @error('cost')
                                        <span class="text-danger mt-2 font-weight-bold">{{ $message }}</span>
                                    @enderror
                                    <div class="add_new_area_btn text-center">
                                        <button type="submit" class="btn btn-danger text-white mt-4" style="background:#ED1C24;">Add Cost</a>
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
