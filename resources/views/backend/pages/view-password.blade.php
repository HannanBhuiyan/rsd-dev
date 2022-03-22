@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <div class="tile_inner_box">
                <div class="row">
                    <div class="col-md-10 m-auto">
                        <h4 class="header-title mb-4">Change Your Password</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                              <li class="breadcrumb-item"><a style="color:#ED1C24; font-weight:700" href="#">Change Password</a></li>
                            </ol>
                        </nav>
                        <div class="add_new_parcel_item">
                            <form method="POST"  action="{{ route('password.change') }}" >
                                @csrf
                                <div class="mb-3 text-start">
                                  <label for="current_password" class="form-label ">Current Passord</label>
                                  <input type="password" placeholder="Enter your Current password" name="current_password" class="form-control" id="current_password">
                                  <div class="div mt-2">
                                    @error('current_password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="mb-3 text-start">
                                  <label for="current_password" class="form-label">New Password</label>
                                  <input type="password" placeholder="Enter your new password" name="new_password" class="form-control" id="current_password">
                                  <div class="div mt-2">
                                    @error('new_password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="mb-3 text-start">
                                  <label for="current_password" class="form-label">Confirm New Passord</label>
                                  <input type="password" placeholder="Enter your Confirm password" name="confirm_password" class="form-control" id="current_password">
                                  <div class="div mt-2">
                                    @error('confirm_password')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                </div>
                                <div class="add_new_parcel_button text-center res__btn_text mt-3">
                                    <button style="submit" class="profile_update_btn">Update Password
                                </button></div>
                              </form>
                        </div>
                     </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
@endsection

