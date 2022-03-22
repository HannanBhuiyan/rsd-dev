@include('frontend.inc.header')
<header>
  <!-- header section start here -->
  <div class="header_section">
    <div class="container">
      <div class="header_area">
         <div class="header_inner">
           <div class="header_left">
             <a href="{{ url('/') }}"><img src="{{ asset('frontend') }}/assets/images/logo/logo.png" alt="header_logo"></a>
           </div>
           <div class="header_menu">
             <ul>
                <li>
                    <a href="#">{{ __('services') }}</a>
                    <div class="coverage_area_list service_sub_menu">
                       <ul class="sub_menu_list">
                           <li><a href="{{ route('parcel.index') }}">Parcel Service</a></li>
                           <li><a href="{{ route('courier.index') }}">Courier Service</a></li>
                       </ul>
                    </div>
                </li>
               <li>
                   <a href="#">{{ __('Coverage Area') }}</a>
                    <div class="coverage_area_list">
                        <div class="coverage_area_list_header">
                            <div class="coverage_area_dist_name">
                                <p>Districts/Dhaka</p>
                            </div>
                            <div class="coverage_area_form">
                                <form>
                                    <input type="text" name="search" id="area_search_id" placeholder="Search...">
                                </form>
                            </div>
                        </div>
                        <div class="coverate_area_list_body"></div>
                    </div>
                </li>
               <li><a href="{{ route('terms.index') }}">{{ __('Terms') }}</a></li>
             </ul>
           </div>
           <div class="header_right">
             <span>{{ __('call') }}</span>
                {{-- <span><a href="{{ url('/language/en') }}"> EN</a> | <a  href="{{ url('/language/bn') }}">বাং</a></span> --}}
            @auth()
                <a href="{{ route('dashboard') }}" style="text-transform: capitalize; color:#000">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</a>
            @else
                <a href="{{ route('login') }}" class="btn">{{ __('Login') }}</a>
            @endauth
           </div>
         </div>
      </div>
    </div>
  </div>
  <!-- header section ending here -->
  <!-- Mobile Menu Start Here -->
  <div class="mobile-menu">
      <div class="header-top">
          <div class="header-item">
              <div class="header-item-left">
                  <div class="header-logo myCustomLogo">
                      <a href="{{ url('/') }}"><img src="{{ asset('frontend') }}/assets/images/logo/logo.png" alt="logo"></a>
                  </div>
              </div>
              <div class="header-item-right">
                <span>
                    <i class="fas fa-times"></i>
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </span>
            </div>
          </div>
      </div>
      <div class="header-bottom">
          <div class="header-menu">
              <ul>
              <li>
                <a href="#">{{ __('services') }}</a>
                <ul class="sub_menu_list">
                    <li><a href="{{ route('parcel.index') }}">Parcel Service</a></li>
                    <li><a href="{{ route('courier.index') }}">Courier Service</a></li>
                </ul>
              </li>
              <li>
                <a href="#" data-bs-target="#exampleModal" data-bs-toggle="modal" >{{ __('Coverage Area') }}</a>
              </li>
              <li><a href="#">Terms</a></li>
            </ul>
          </div>
      </div>
  </div>
  <!-- Mobile Menu Ending Here -->
</header>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
            <div class="mobile_menu_list_title">
                <p>Districts/Dhaka</p>
            </div>
            <form>
                <input type="text" name="search"  id="menu_area_search_id" placeholder="Search...">
            </form>
            <div class="menu_coverate_area_list_body">
                {{-- <ul>
                    <li>
                        <div class="coverage_area_list_inner">
                            <div class="coverage_area_list_item">
                                <div class="coverage_area_list_right">
                                    <p>District</p>
                                </div>
                                <div class="coverage_area_list_left">
                                    <p>1200</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="coverage_area_list_inner">
                            <div class="coverage_area_list_item">
                                <div class="coverage_area_list_right">
                                    <p>District</p>
                                </div>
                                <div class="coverage_area_list_left">
                                    <p>1200</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="coverage_area_list_inner">
                            <div class="coverage_area_list_item">
                                <div class="coverage_area_list_right">
                                    <p>District</p>
                                </div>
                                <div class="coverage_area_list_left">
                                    <p>1200</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul> --}}
            </div>


            {{-- <div class="coverate_area_list_body">
            </div> --}}

            {{-- <div class="coverage_area_list">
                <div class="coverage_area_dist_name">
                    <p>Districts/Dhaka</p>
                </div>
                <div class="coverage_area_form">
                    <form>

                    </form>
                </div>
                <div class="coverate_area_list_body">
                </div>
            </div> --}}
        </div>
      </div>
    </div>
  </div>
@yield('content')
<!-- FOOTER START -->
<footer>
    <div class="footer-area mt-260">
    <div class="footer-top">
        <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="footer-top-section">
                    <div class="row align-items-center ">
                    <div class="col-md-8">
                        <div class="footer-top-info">
                            <h3>{{ __('Contact With Us') }}</h3>
                            <p>{{ __('contactDesc') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                    <div class="footer-top-right text-center text-lg-end">
                        <a href="#" class="btn btnf">Contact Us</a>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="footer-bottom pb-40 pt-135">
        <div class="container">
            <div class="footer-widget-secton ">
                <div class="row footer_row">
                    <!-- single section -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget">
                            <div class="flogo-img" style="margin-top:-7px">
                            <img src="{{ asset('frontend') }}/assets/images/logo/logo-2.png" alt="logo">
                            </div>
                            <div class="contact_address">
                                <ul>
                                    <li><span>Contact Us: </span>+880 1972-998085</li>
                                    <li><span>Email: </span>rsdcourier22@gmail.com</li>
                                </ul>
                            </div>
                            <div class="social_link">
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/rsdparcel"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href=""><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- single section -->
                    <!-- single section -->
                    <div class="col-12 col-sm-6 col-lg-2">
                        <div class="footer-widget">
                        <h3>Services</h3>
                            <ul class="footer-info">
                            <li><a href="#">Home Delivery</a></li>
                            <li><a href="#"> Warehousing</a></li>
                            <li><a href="#">Pick and drop</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- single section -->
                    <!-- single section -->
                    <div class="col-12 col-sm-6 col-lg-2">
                        <div class="footer-widget">
                        <h3>Earn</h3>
                            <ul class="footer-info">
                            <li><a href="#">Become Marchent</a></li>
                            <li> <a href="#">Become Rider</a></li>
                            <li><a href="#">Become Delivery Man</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- single section -->
                    <!-- single section -->
                    <div class="col-12 col-sm-6 col-lg-2">
                        <div class="footer-widget">
                        <h3>Company</h3>
                            <ul class="footer-info">
                            <li><a href="#">About Us</a></li>
                            <li> <a href="#">Contact Us</a></li>
                            <li><a href="#">Our Goal</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- single section -->
                    <!-- single section -->
                    <div class="col-12 col-md-12 col-lg-3">
                        <div class="footer-widget text-lg-center text-xl-start">
                        <h3>About Us</h3>
                            <p>{{ __('footerDesc') }}</p>
                        </div>
                    </div>
                    <!-- single section -->
                </div>
            </div>
            <div class="copyrightsection align-items-center">
                <div class="footer_para">
                    <p>Copyright &#169 2022 RSD </p> 
                </div> 
                <div class="bar">
                    <span style="color: #fff; margin-right: 22px"> |</span>
                </div>
                <div class="footer_img">
                    <a href="https://opediatech.com/"><img src="{{ asset('frontend') }}/assets/images/footer-logo.png" alt=""></a>
                </div>
            </div>
        </div>
    </div> 
    </div>
</footer>
<!-- FOOTER ENDS -->
@section('footer_script')
    <script type="text/javascript">
        // search area start
        $("#area_search_id").on("keyup", function(){
            let searchData = $("#area_search_id").val()
            if(searchData.length > 0){
                $.ajax({
                    type: 'POST',
                    url: "/search-area",
                    data: {search: searchData},
                    success: function (response) {
                        $(".coverate_area_list_body").html(response)
                    },
                    error: function (data) {
                        console.log('warning');
                    }
                });
            }else {
                $(".coverate_area_list_body").html("")
            }
        })

        $("#menu_area_search_id").on("keyup", function(){
            let searchData = $("#menu_area_search_id").val()
            if(searchData.length > 0){
                $.ajax({
                    type: 'POST',
                    url: "/search-area",
                    data: {search: searchData},
                    success: function (response) {
                        $(".menu_coverate_area_list_body").html(response)
                    },
                    error: function (data) {
                        console.log('warning');
                    }
                });
            }else {
                $(".menu_coverate_area_list_body").html("")
            }
        })
        // search area end
        // get calculation
        function getCalculateData(){
            $.ajax({
                type: 'GET',
                url: "/totalcost",
                dataType:'json',
                success: function (data) {
                        $(".totalCost").val(data.totalCost)
                        console.log("success")
                },
                error: function (data) {
                    console.log(data);
                    console.log('wrong')
                }
            });
        }
        // insert calculation
        $(".calculate").on("click", function(){
            let fromarea = $("#c-from").val()
            let destination = $("#c-destination").val()
            let serviceItem = $("#c-service").val()
            let weight = $("#c-weight").val()
            $.ajax({
                type: 'POST',
                url: "/calculation",
                data: {
                        fromarea: fromarea,
                        destination: destination,
                        serviceItem: serviceItem,
                        weight: weight,
                    },
                success: function (response) {
                    getCalculateData();
                    console.log("success")
                },
                error: function (error) {
                    console.log('wrong')
                }
            });
        })
    </script>
    @if(Session::has('success'))
    <script>
        toastr.success("{!! Session::get('success') !!}");
    </script>
    @endif
    @if(Session::has('fail'))
        <script>
            toastr.error("{!! Session::get('fail') !!}");
        </script>
    @endif
@endsection
@include('frontend.inc.footer')


