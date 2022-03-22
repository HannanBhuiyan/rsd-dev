@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div >
            <div class="tile_inner_box">
                <h4 class="header-title mb-4">Edit Profile Information</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('view.profile') }}">Profile</a></li>
                      <li class="breadcrumb-item" aria-current="page"><a style="color:#ED1C24; font-weight:700" href="#">Edit Profile</a></li>
                    </ol>
                </nav>
                <form method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="add_new_parcel_item info-profile">
                        <div class="row">
                            <div class="col-xl-3 col-12">
                            <div class="info__image">
                                <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                                <input name="image" onchange="document.getElementById('img_id').src=window.URL.createObjectURL(this.files[0])" type="file" class="custom__profile__image">
                                <img  id="img_id" class="image_responsive_class" src="{{ asset(Auth::user()->image) }}" alt="default_iamge">
                            </div>
                            </div>
                            <div class="col-xl-8 col-12">
                            <div class="add_new_parcel_item edit-profile">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label>First Name</label>
                                        <input type="text" placeholder="Enter your Firstname" name="fname" value="{{ Auth::user()->fname }}">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Last Name</label>
                                        <input type="text" placeholder="Enter your Lastname" name="lname" value="{{ Auth::user()->lname }}">
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <label for="current_password" class="form-label">Gender</label>
                                        <select name="gender" class="admin__edit__gender  @error('gender') is-invalid @enderror">
                                            <option>--Choose One--</option>
                                            <option {{  Auth::user()->gender == 'male' ? "selected" : ""}} value="male">Male</option>
                                            <option {{  Auth::user()->gender == 'female' ? "selected" : ""}} value="female">Female</option>
                                            <option {{  Auth::user()->gender == 'others' ? "selected" : ""}} value="others">Others</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Phone Number</label>
                                        <input type="text" placeholder="Enter your phone number" name="phone" value="{{ Auth::user()->phone }}">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="text" placeholder="Enter your email address" name="email" value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="add_new_parcel_button text-center res__btn_text mt-3">
                                        <button class="profile_update_btn">Save Information</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-xl-1 col-12"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
