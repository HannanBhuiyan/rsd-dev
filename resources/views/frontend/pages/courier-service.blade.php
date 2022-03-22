@extends('layouts.frontend-master')
@section('content')
<!-- ------------------------------------------------------ -->
<!-- parcel service start here -->
<!-- ------------------------------------------------------ -->
<!-- parcel_service_banner_section start from here  -->
<div class="parcel_service_banner_section" style="background-image:linear-gradient(rgb(20 20 22 / 7%), rgb(2 9 30 / 47%)), url({{ asset('frontend') }}/assets/images/parcel/Courier\ Delivery.png);">
  <div class="container">
      <div class="parcel_service_banner_section_inner courier_banner">
        <div class="parcel_service_para">
          <h1>Fastest courier delivery services for your business</h1>
          <p>We present the fast courier delivery service in Dhaka. We will ship your parcel to your expected location bang on time.</p>
          <div class="deliver__earn__button" style="margin-top: 25px;">
            <a class="btn " href="{{ route('login') }}">Join Merchant</a>
          </div>
        </div>
      </div>
  </div>
</div>
<!-- parcel service end here -->
<!-- bike features section  start here -->
<div class="bike__feature__section">
  <div class="container">
    <div class="bike__feature__section__inner">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="bike__feature one">
            <div class="bike__image">
              <img src="{{ asset('frontend') }}/assets/images/vector-png/Live tracking facility-01-01.png" alt="">
            </div>
            <div class="bike__feature__heading">
              <h2>Live tracking </h2>
              <p>With our live tracking service, you can track your package anytime from anywhere. So that, you can get notified about your parcel’s location. From now on there is no room for misplacing your package.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="bike__feature two">
            <div class="bike__image">
              <img src="{{ asset('frontend') }}/assets/images/vector-png/Customer support-01.png" alt="">
            </div>
            <div class="bike__feature__heading">
              <h2>Customer support</h2>
              <p>We will be right over to support you. You can get support based on our services through phone calls and messages from anywhere. </p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="bike__feature three">
            <div class="bike__image">
              <img src="{{ asset('frontend') }}/assets/images/vector-png/Same day payment__Mesa de trabajo 1.png" alt="">
            </div>
            <div class="bike__feature__heading">
              <h2>Same day payment</h2>
              <p>After taking payment from your customers, we will transfer money to you within 5 to 6 hours without hassle. Therefore, you can stay concentrated on your business and achieve your goal without any resistance.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- bike features section end here -->
  <!-- accordion and app section start here -->
  <!-- <div class="accordion__section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8">
          <div class="accordion">
            
            <h1>How It Work's</h1>
            <div class="accordion__one">
              <div class="accordion__display__one">
                  <h4> <span>1</span> Download The App </h4><i id="firsticon__for__one" class="fa-solid fa-arrow-down-long"></i>   
              </div>
              <div class="accordion__hidden__one">
                  <p>#1 Platfrom for All Services</p>
                  <div class="accordion__stations">
                      <img src="assets/images/parcel/appstore.png" alt="">
                      <img src="assets/images/parcel/play-store.png" alt="">
                  </div>
              </div>
            </div>
            <div class="accordion__two">
              <div class="accordion__display__two">
                  <h4><span>2</span>Select the Parcel Option and Location </h4> <i id="firstsicon__for__two" class="fa-solid fa-arrow-down-long"></i>  
              </div>
              <div class="accordion__hidden__two">
                  <p>#2 Open and Select the Parcel option. Set you pick-up and destination</p>
                  
              </div>
            </div>
          <div class="accordion__three">
              <div class="accordion__display__three">
                  <h4> <span>3</span> Fill in The Information </h4> <i id="firstsicon__for__three" class="fa-solid fa-arrow-down-long"></i>  
              </div>
              <div class="accordion__hidden__three">
                  <p>#3 Fill in the receiver’s information and the type of product being delivered and wait for your parcel to be picked up!s</p>
                  
              </div>
          </div>   
          </div>
        </div>
        <div class="col-md-4 android__app">
          <img src="assets/images/parcel/RSDapp.png" alt="">
        </div>
      </div>
    </div>
  </div> -->
  <!-- accrodion and app section end here -->
  <!-- courier service section (coverage area section) start here -->
  <div class="courier__service__section">
    <div class="container">
      <div class="standard__service">
        <div class="standard__express__title">
          <h1>Our Coverage Areas</h1>
        </div>
         <div class="courier__map__section">
           <div class="row ">
             <div class="col-md-2"></div>
             <div class="col-md-8">
              <div class="coverage__area__img text-center">
                <img src="{{ asset('frontend') }}/assets/images/parcel/map.png" alt="" width="100%">
              </div>
             </div>
             <div class="col-md-2"></div>
           </div>
         </div> 
        
      </div>
    </div>
  </div>
  <!-- courier service section (coverage area section) end here -->
 <!-- courier delivery signup section start here -->
  <div class="courier__delivery__signup__section">
    <div class="container">
      <div class="courier__delivery__signup__section__inner">
        <div class="courier__delivery__signup__section_des">
          <p>Sign up with RSD as a merchant</p>
          <h2>Start delivering products using RSD courier</h2>
        </div>
        <div class="courier__delivery__signup__section_btn">
          <a class="btn" href="{{ route('create.account') }}">Join Merchant</a>
        </div>
      </div>
    </div>
  </div>
  <!-- courier delivery signup section end here -->
  <!-- earn__step__section start here -->
  <div class="earn__step__section">
    <div class="container">
     <div class="earn__step__inner">
      <div class="row align-items-center">
        <div class="col-xl-6 col-md-12">
          <div class="earn__step__img">
            <img src="{{ asset('frontend') }}/assets/images/parcel/priority.jpg" alt="">
          </div>
        </div>
        <div class="col-xl-6 col-md-12">
          <div class="earn__step">
            <div class="earn__step__title">
              <h2>Satisfaction is our priority</h2>
              <p>We come up with the first-rated services at a cost-effective price. We always make sure our client’s satisfaction through our reliable courier services. We never look away from any issues with our client's convenience.</p>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
  </div>
  <!-- earn__step__section end here -->
  <!-- courier page contact us section start here -->
  <div class="courierpage__contact__us__section">
    <div class="container">
      <div class="courierpage__contact__us__inner">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="section__contact__us">
              <h2>Contact us with any question</h2>
              <div class="contact__address">
                <p>Phone - <a href="#">+88015462546</a></p>
                <p>E-mail - <a href="#">rsdcourier22@gmail.com</a></p>
              </div>
              <a class="btn" href="{{ route('create.account') }}">Join Merchant</a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="section__contact__us__img">
              <img src="{{ asset('frontend') }}/assets/images/vector-png/call center-01.png" alt="">
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
  <!-- courier page contact us section end here -->
@endsection
