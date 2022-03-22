@extends('layouts.frontend-master')
@section('content')
 <!-- parcel service start here -->
  <!-- parcel_service_banner_section start from here  -->
  <div class="parcel_service_banner_section" style="background-image: linear-gradient(rgb(20 20 22 / 7%), rgb(2 9 30 / 47%)), url({{ asset('frontend') }}/assets/images/parcel/Parcel\ Delivery.png)">
    <div class="container">
        <div class="parcel_service_banner_section_inner">
          <div class="parcel_service_para">
            <h1>Door to Door parcel delivery services in Dhaka </h1> <i class="fa-solid fa-square-down"></i>
            <p>The most tried and true doorstep parcel services provider at your service</p>
            <div class="deliver__earn__button" style="margin-top: 25px;">
              <a class="btn " href="{{ route('create.account') }}">Sign Up</a>
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- parcel service end here -->
  <!-- item__section  start here -->
  <div class="send__item__section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="send__item__title">
            <h2>What Can You Send</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="send__items__area">
            <div class="send__items">
              <div class="send__item__img">
                <img src="{{ asset('frontend') }}/assets/images//delivery/d1.png" alt="">
              </div>
              <p>Dress</p>
            </div>
            <div class="send__items">
              <div class="send__item__img">
                <img src="{{ asset('frontend') }}/assets/images/delivery/d2.png" alt="">
              </div>
              <p>Jewellery</p>
            </div>
            <div class="send__items">
              <div class="send__item__img">
                <img src="{{ asset('frontend') }}/assets/images/delivery/d3.png" alt="">
              </div>
              <p>Gift Box</p>
            </div>
            <div class="send__items">
              <div class="send__item__img">
                <img src="{{ asset('frontend') }}/assets/images/delivery/d5.png" alt="">
              </div>
              <p>E-Device</p>
            </div>
            <div class="send__items">
              <div class="send__item__img">
                <img src="{{ asset('frontend') }}/assets/images/delivery/d6.png" alt="">
              </div>
              <p>Dry Food</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- item__section end here -->
  <!-- bike features section  start here -->
  <div class="bike__feature__section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="bike__feature one">
            <div class="bike__image">
              <img src="{{ asset('frontend') }}/assets/images/vector-png/Cost-effective-01.png" alt="">
            </div>
            <div class="bike__feature__heading">
              <h2>Cost-effective</h2>
              <p>We bring a budget-friendly parcel delivery service. Henceforth, you don’t need to bear any hidden cost for your parcel.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="bike__feature one">
            <div class="bike__image">
              <img src="{{ asset('frontend') }}/assets/images/vector-png/Cash less delivery-01.png" alt="">
            </div>
            <div class="bike__feature__heading">
              <h2>Cashless delivery</h2>
              <p>To make the payment system more convenient for our clients, we give cashless payment (E -payment) service. From now on, pay your delivery cost without any difficulty.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="bike__feature one">
            <div class="bike__image">
              <img src="{{ asset('frontend') }}/assets/images/vector-png/fast.png" alt="">
            </div>
            <div class="bike__feature__heading">
              <h2>Fast and safely</h2>
              <p>We appreciate the value of your time and emotion. With this intention, we provide the fastest parcel delivery service in Bangladesh. Additionally, we handle your parcel with extra care to avoid any hamper.</p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <!-- bike features section end here -->
  <!-- earn__step__section start here -->
  <div class="earn__step__section">
    <div class="container">
     <div class="earn__step__inner">
      <div class="row align-items-center">
        <div class="col-xl-6 col-md-12">
          <div class="earn__step">
            <div class="earn__step__title coverage_area">
              <h2>Our coverage area</h2>
              <p>We deliver your parcel within 24 hours all over Dhaka. 
                Our other delivery coverage areas are Narayanganj and Gazipur. 
                We are committed to delivering your parcel as fast as possible 
                in our delivery coverage area. We are constantly trying to 
                extend our coverage area for your convenience.  
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-md-12">
          <div class="earn__step__img">
            <img src="{{ asset('frontend') }}/assets/images/parcel/parcel_item_img9.jpg" alt="">
          </div>
        </div>
      </div>
     </div>
    </div>
  </div>
  <!-- earn__step__section end here -->
@endsection
