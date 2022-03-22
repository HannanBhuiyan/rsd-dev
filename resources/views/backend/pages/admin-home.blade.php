@extends('layouts.backend-master')
@section('content')
    <div class="row">
        <div class="col-12">
            @if (Auth::user()->role == 1)
            <div class="alert alert-success alert-dismissible fade show customalert" role="alert">
                <strong>Welcome </strong>Admin
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div> 
                <h4 class="header-title mb-4">Account Overview</h4>
                <div class="tile_inner_box">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="tile_box">
                                <div class="img_section">
                                    <img src="{{ asset('backend/vertical') }}/assets/images/icon/tile1.png" alt="tile_iamge">
                                </div>
                                <h2>Tk {{  unpaidtotalincomeCount() }}</h2>
                                <p>Unpaid</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="tile_box">
                                <div class="img_section" style="background-color: #06B496">
                                        <img src="{{ asset('backend/vertical') }}/assets/images/icon/tile2.png" alt="tile_iamge">
                                </div>
                                <h2 style="color: #06B496">Tk {{ todaytotalincomeCount() }}</h2>
                                <p>Today</p>
                            </div>
                            </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="tile_box">
                                <div class="img_section" style="background-color: #FF9D34">
                                        <img src="{{ asset('backend/vertical') }}/assets/images/icon/tile3.png" alt="tile_iamge">
                                </div>
                                <h2 style="color: #FF9D34">Tk {{ totalCostCount() }}</h2>
                                <p>Total Amount</p>
                            </div>
                        </div>
                        @php
                            $onlineUserCount = 0;
                        @endphp
                        @foreach (onlineUse() as $row)
                           @php
                                if ($row->isOnline()){
                                    $onlineUserCount = $onlineUserCount + 1;
                                } 
                           @endphp
                        @endforeach
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="tile_box">
                                <div class="img_section" style="background-color: #198754">
                                    <i style="color: #fff;  font-size: 30px;  padding-top: 22px;  display: block; }" class="fa fa-user-circle"></i>
                                </div>
                                <h2 style="color: #198754">{{ $onlineUserCount }} Person</h2>
                                <p>Active</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="view_title_group">
                        <h4 class="header-title">Sales Analysis</h4>
                    </div>
                    <div class="card radius-10 w-100 sales__custom_class">
                        <div class="card-body">
                            <div id="chart5"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="view_title_group d-flex justify-content-between align-items-center">
                    <h4 class="header-title">Active Parcel</h4>
                    <a class="view__all" href="{{ route('allPersonalParcelView') }}">view all</a>
                    </div>
                    <div class="card-box">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered m-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Invoice ID</th>
                                        <th>Delivery Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (activeParcel() as $parcel)
                                        <tr>
                                            <td>  <span class="m-0 ml-1 font-weight-normal">{{ $parcel->recipientName }}</span>  </td>
                                            <td>{{ $parcel->invoice_no }}</td>
                                            <td>
                                                @if ($parcel->status == 'pending')
                                                    <button class="statusCommonButton pending mr-2">Pending</button>
                                                @elseif ($parcel->status == 'cancel')
                                                    <span class="statusCommonButton cancel ca">Canceled</span>
                                                @elseif ($parcel->status == 'delivery')
                                                    <span class="statusCommonButton delivery delivery-btn">Delivered</span>
                                                @elseif ($parcel->status == 'picked')
                                                    <span class="statusCommonButton picked delivery-btn pi">Picked</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="view_title_group d-flex justify-content-between align-items-center">
                        <h4 class="header-title">Last Payment Via All</h4>
                        <a class="view__all" href="#">view all</a>
                    </div>
                    <div class="card-box">
                        <div class="table-responsive">
                            <table class="table table-hover table-centered m-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Invoice No</th>
                                        <th>Total Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (delivaryParcelCosts() as $parcel)
                                    <tr>
                                        <td>  <span class="m-0 ml-1 font-weight-normal">{{ $parcel->recipientName }}</span>  </td>
                                        <td>{{ $parcel->invoice_no }}</td>
                                        <td>{{ $parcel->totalcosts }} Tk</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            @elseif(Auth::user()->role == 5)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Welcome </strong>User
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <h4 class="header-title mb-4">Account Overview</h4>
                <div class="tile_inner_box">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="tile_box">
                                <div class="img_section">
                                    <a href="{{ route('personal.parcel') }}"><img src="{{ asset('backend/vertical') }}/assets/images/icon/tile4.png" alt="tile_iamge"></a>
                                </div>
                                <h2>New Parcel</h2>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="tile_box">
                                <div class="img_section">
                                    <img src="{{ asset('backend/vertical') }}/assets/images/icon/tile3.png" alt="tile_iamge">
                                </div>
                                <h2>Tk {{ personaltotalCostCount() }}</h2>
                                <p>Total Amount</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            @elseif (Auth::user()->role == 4)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Welcome </strong>Merchant
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <h4 class="header-title mb-4">Account Overview</h4>
                <div class="tile_inner_box">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="tile_box">
                                <div class="img_section">
                                        <a href="{{ route('business.parcel') }}"><img src="{{ asset('backend/vertical') }}/assets/images/icon/tile4.png" alt="tile_iamge"></a>
                                </div>
                                <h2>New Parcel</h2>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="tile_box">
                                <div class="img_section">
                                        <img src="{{ asset('backend/vertical') }}/assets/images/icon/tile3.png" alt="tile_iamge">
                                </div>
                                <h2>Tk {{ businesstotalCostCount() }}</h2>
                                <p>Total Amount</p>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            @elseif (Auth::user()->role == 3)
            <div class="alert alert-success alert-dismissible fade show customalert" role="alert">
                <strong>Welcome </strong>Editor
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
@endsection
@section('admin_footer_script')
<script>
       var options = {
    series: [{
        name: "Revenue",
		data: [0, 0, @foreach (totalMonthlyIncome()  as $item){{ $item->amount."," }} @endforeach]
    }],
    chart: {
        type: "area",
        // width: 130,
	    stacked: true,
        height: 380,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#3461ff"
        },
        sparkline: {
            enabled: !1
        }
    },
    markers: {
        size: 0,
        colors: ["red"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
	grid: {
		row: {
			colors: ["transparent", "transparent"],
			opacity: .2
		},
		borderColor: "#f1f1f1"
	},
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "35%",
            // endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: [2.5],
		//colors: ["#3461ff"],
        curve: "smooth"
    },
	fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'vertical',
		  shadeIntensity: 0.5,
		  gradientToColors: ["rgba(255, 63, 70, 0.38) -40.59%, rgba(237, 28, 36, 0)"],
		  inverseColors: false,
		  opacityFrom: 0.5,
		  opacityTo: 0.1,
		 // stops: [0, 100]
		}
	},
	colors: ["red"],
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
	responsive: [
		{
		  breakpoint: 1000,
		  options: {
			chart: {
				type: "area",
			   // width: 130,
				stacked: true,
			}
		  }
		}
	  ],
	legend: {
		show: false
	  },
    tooltip: {
        theme: "dark",  
    }
  };
  var chart = new ApexCharts(document.querySelector("#chart5"), options);
  chart.render();
</script>
@endsection