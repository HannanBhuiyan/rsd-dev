@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div >
            <div class="tile_inner_box">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <h4 class="header-title mb-4">Profile Information</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                              <li class="breadcrumb-item"><a style="color:#ED1C24; font-weight:700" href="{{ route('view.profile') }}">Profile</a></li>
                            </ol>
                        </nav>
                        <div class="add_new_parcel_item info-profile">
                             <div class="row">
                                 <div class="col-xl-3 col-12">
                                    <div class="info__image">
                                        <img  id="img_id" class="image_responsive_class" src="{{  asset(Auth::user()->image) }}" alt="default_iamge">
                                    </div>
                                 </div>
                                 <div class="col-xl-8 col-11">
                                  <div class="user__info__data">
                                    <table>
                                        <tr>
                                            <th>User ID</th>
                                            <td>: {{ Auth::user()->id }}</td>
                                        </tr>
                                       @if (Auth::user()->role != 4)
                                        <tr>
                                            <th>First Name</th>
                                            <td>: {{ Auth::user()->fname }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td>: {{ Auth::user()->lname }}</td>
                                        </tr>
                                       @endif
                                        @if (Auth::user()->role == 4)
                                        <tr>
                                            <th>Company Name</th>
                                            <td>: sdfsadf</td>
                                        </tr>
                                        <tr>
                                            <th>Owner Name</th>
                                            <td>: Mr. Alex Brown</td>
                                        </tr>
                                        @endif
                                        @if (Auth::user()->role != 4)
                                            <tr>
                                                <th>Gender</th>
                                                <td>: {{ Auth::user()->gender }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Phone Number</th>
                                            <td>: {{ Auth::user()->phone }}</td>
                                        </tr>

                                        <tr>
                                            <th>Email Address</th>
                                            <td>: {{ Auth::user()->email }}</td>
                                        </tr>
                                        @if (Auth::user()->role == 4)
                                            <tr>
                                                <th>Office Address</th>
                                                <td>: Golden Plaza(3rd floor), House # 15/b, Road # 01, Paltan,
                                                    Dhaka , Bangladesh</td>
                                            </tr>
                                        @endif
                                    </table>
                                  </div>
                                 </div>
                                 <div class="col-xl-1 col-1">
                                     <div class="info_edit_icon">
                                        <a href="{{ route('profile.edit')}}"><i class="fa fa-edit"></i></a>
                                     </div>
                                 </div>
                             </div>
                        </div>
                     </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
@endsection

