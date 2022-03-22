<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>RSD Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('backend/vertical') }}/assets/images/favicon.ico">
        <link href="{{ asset('backend/vertical') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/vertical') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/vertical') }}/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
        <link href="{{ asset('backend/vertical') }}/assets/css/sweetalert.css" />
        <link href="{{ asset('backend/vertical') }}/assets/css/style.css" rel="stylesheet" type="text/css" />
        <script src="{{ asset('backend/vertical') }}/assets/js/modernizr.min.js"></script>
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">
                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="{{ route('dashboard') }}" class="logo">
                            <span>
                                <img src="{{ asset('backend/vertical') }}/assets/images/logo.png" alt="">
                            </span>
                            <i>
                                <img src="{{ asset('backend/vertical') }}/assets/images/logo_sm.png" alt="" height="28">
                            </i>
                        </a>
                    </div>
                    <!-- User box -->
                    <div class="user-box"></div>
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul class="metismenu" id="side-menu">
                        <li>
                            <a href="{{ url('/') }}" target="_blank">
                                <span><i class="fa fa-low-vision"></i> Visit Site </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}" class="active">
                                <img src="{{ asset('backend/vertical') }}/assets/images/icon/icon1.png" alt="">  Dashboard </span>
                            </a>
                        </li>
                        
                        @if (Auth::user()->role == 5)
                        <li>
                            <a href="{{ route('personal.parcel') }}">
                                <img src="{{ asset('backend/vertical') }}/assets/images/icon/icon4.png" alt=""><span> Parcel </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('personal.parcel.index') }}">
                                <i style="font-size: 20px" class="fa fa-th-large"></i><span> All Summery </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('support.create') }}">
                                <img src="{{ asset('backend/vertical') }}/assets/images/icon/icon6.png" alt=""><span> Support </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('trash.parcel.index') }}">
                                <i style="font-size: 20px" class="fa fa-trash"></i>  <span> Trash Parcel </span>
                            </a>
                        </li>
                    
                        @elseif (Auth::user()->role == 4)
                        <li>
                            <a href="{{ route('business.parcel') }}">
                                <img src="{{ asset('backend/vertical') }}/assets/images/icon/icon4.png" alt=""><span> Parcel </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('business.parcel.index') }}">
                                <i style="font-size: 20px" class="fa fa-th-large"></i><span> All Summery </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('support.create') }}">
                                <img src="{{ asset('backend/vertical') }}/assets/images/icon/icon6.png" alt=""><span> Support </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('business.trash.parcel.index') }}">
                                <i style="font-size: 20px" class="fa fa-trash"></i> <span> Trash Parcel </span>
                            </a>
                        </li>
                        @elseif (Auth::user()->role == 1)
                        <li>
                            <a href="{{ route('view.allpayment') }}">
                                <img src="{{ asset('backend/vertical') }}/assets/images/icon/icon3.png" alt=""><span> View Payment </span>
                            </a>
                        </li> 
                        <li>
                            
                            <a href="javascript: void(0);"> <i style="font-size: 20px" class="fa fa-area-chart"></i> <span> Coverage Area </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('coverageDistrict.index') }}">List District</a></li>
                                <li><a href="{{ route('coverageArea.index') }}">List Area</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);"> <i style="font-size: 20px" class="fa fa-money"></i><span> Cost </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('cost.create') }}">Area Cost</a></li>
                                <li><a href="{{ route('cost.index') }}">Cost List</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);"><img src="{{ asset('backend/vertical') }}/assets/images/icon/icon4.png" alt=""><span> Parcel </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('allPersonalParcelView') }}">Personal Parcel</a></li>
                                <li><a href="{{ route('allBusinessParcelView') }}">Business Parcel</a></li>
                            </ul>
                        </li> 
                        <li>
                            <a href="{{ route('message.view') }}">
                                <i style="font-size: 20px" class="fa fa-envelope-open"></i><span> Message </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);"><i style="font-size: 20px" class="fa fa-users"></i><span> Role Management </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('allUsers') }}">
                                        <span> All User </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('allMerchant') }}">
                                        <span> All Merchent </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('allAdmin') }}">
                                        <span> All Admin </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('allEditor') }}">
                                        <span> All Editor </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('allbanned') }}">
                                        <span> All Banned </span>
                                    </a>
                                </li>
                            </ul>
                        </li> 
                        <li>
                            <a href="{{ route('setting.view') }}">
                                <img src="{{ asset('backend/vertical') }}/assets/images/icon/icon5.png" alt=""><span> Settings </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.trash.parcel.index') }}">
                                <i style="font-size: 20px" class="fa fa-trash"></i> <span> Trash Parcel </span>
                            </a>
                        </li>
                        @elseif (Auth::user()->role == 3)
                        <li>
                            <a href="javascript: void(0);"> <i style="font-size: 20px" class="fa fa-area-chart"></i> <span> Coverage Area </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('coverageDistrict.index') }}">List District</a></li>
                                <li><a href="{{ route('coverageArea.index') }}">List Area</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);"> <i style="font-size: 20px" class="fa fa-money"></i><span> Cost </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('cost.create') }}">Area Cost</a></li>
                                <li><a href="{{ route('cost.index') }}">Cost List</a></li>
                            </ul>
                        </li>
                        @endif
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page ">
                <!-- Top Bar Start -->
                <div class="topbar">
                    <nav class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
                            @if (Auth::user()->role == 1)
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-speech-bubble noti-icon"></i>
                                    <span class="badge badge-custom badge-pill noti-icon-badge">{{  messageCount() }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Chat</h5>
                                    </div>
                                    <div class="slimscroll" style="max-height: 230px;">
                                        @forelse (unreadMessage() as $msg)
                                            <!-- item-->
                                            <a href="{{ route('message.view') }}" class="dropdown-item notify-item">
                                                @auth
                                                    <div class="notify-icon"><img src="{{ asset($msg->relationWithUser->image) }}" class="img-fluid rounded-circle" alt="" /> </div>
                                                @endauth
                                                <p class="notify-details">{{ $msg->name }}</p>
                                                <p class="text-muted font-13 mb-0 user-msg">{{ $msg->message }}</p>
                                            </a>
                                        @empty
                                            <div class="text-center">
                                                <span class="text-danger">Message Not Found</span>
                                            </div>
                                        @endforelse   
                                    </div> 
                                    <!-- All-->
                                    <a href="javascript:void(0);" class="dropdown-item text-center custom_color_rsd text-primary notify-item notify-all">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>
                                </div>
                            </li>
                            @endif
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                   @auth 
                                        <img src="{{ asset(Auth::user()->image) }}" alt="user" class="rounded-circle">
                                   @endauth
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>
                                    <!-- item-->
                                    <a href="{{ route('view.profile') }}" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>Profile</span>
                                    </a>
                                    <!-- item-->
                                    <a href="{{ route('profile.view') }}" class="dropdown-item notify-item">
                                        <i class="fi-help"></i> <span>Change Password</span>
                                    </a>
                                    <!-- item-->
                                    @if (Auth::user()->role == 1)
                                        <a href="{{ route('setting.view') }}" class="dropdown-item notify-item">
                                            <i class="fi-cog"></i> <span>Settings</span>
                                        </a>
                                    @endif
                                   <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();    document.getElementById('logout-form').submit();">
                                       <i class="fi-power"></i>  {{ __('Logout') }}
                                   </a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                   </form>
                                </div>
                            </li>
                        </ul>
                        <ul class="list-inline menu-left mb-0 d-lg-none">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- Top Bar End -->
                <!-- Start Page content -->
                <div class="content dashboard_custon_class">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div> <!-- content -->
                <footer class="footer text-right">
                    2022 © RSD. - Opediatech.com
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->
        <!-- jQuery  -->
        <script src="{{ asset('backend/vertical') }}/assets/js/jquery.min.js"></script>
        <script src="{{ asset('backend/vertical') }}/assets/js/popper.min.js"></script>
        <script src="{{ asset('backend/vertical') }}/assets/js/bootstrap.min.js"></script>
        <script src="{{ asset('backend/vertical') }}/assets/js/metisMenu.min.js"></script>
        <script src="{{ asset('backend/vertical') }}/assets/js/waves.js"></script>
        <script src="{{ asset('backend/vertical') }}/assets/js/jquery.slimscroll.js"></script>
        <script src="{{ asset('backend/vertical') }}/assets/js/apexcharts.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <script src="https://kit.fontawesome.com/4ad924524e.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend/vertical') }}/assets/js/sweetalert.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('backend') }}/plugins/footable/js/footable.all.min.js"></script>
        <script src="{{ asset('backend/vertical') }}/assets/pages/jquery.footable.js"></script>
        <!-- App js -->
        <script src="{{ asset('backend/vertical') }}/assets/js/jquery.core.js"></script>
        <script src="{{ asset('backend/vertical') }}/assets/js/jquery.app.js"></script>
        <script>
            $(document).ready(function() {
            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false
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
        @if(Session::has('warning'))
            <script>
                toastr.warning("{!! Session::get('warning') !!}");
            </script>
        @endif
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @yield('admin_footer_script')
    </body>
</html>



