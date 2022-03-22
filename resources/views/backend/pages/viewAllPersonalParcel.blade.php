@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="m-t-0 header-title v-payment">All Personal Parcel</h4>
        <div class="card-box">
            <div class="mb-3">
                <div class="row">
                    <div class="col-12 text-sm-center form-inline">
                        <div class="form-group mr-2">
                            <select id="demo-foo-filter-status" class="custom-select">
                                <option value="">Show all</option>
                                <option value="Pending">Pending</option>
                                <option value="Delivered">Delivered</option>
                                <option value="Canceled">Canceled</option>
                                <option value="Picked">Picked</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input id="demo-foo-search" type="text" placeholder="Search" class="form-control" autocomplete="on">
                        </div>
                    </div>
                </div>
            </div>
            <table id="demo-foo-filtering" class="table text-center table-bordered toggle-circle m-b-0" data-page-size="7">
                <thead>
                    <tr>
                        <th data-toggle="true">Recipient Name</th>
                        <th>Invoice.NO</th>
                        <th data-hide="phone">Date</th>
                        <th data-hide="phone, tablet">Total Cost</th>
                        <th data-hide="phone, tablet">Assign Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($personalParcelData as $parcel)
                    <tr>
                        <td>  <span class="m-0 ml-1 font-weight-normal">{{ $parcel->recipientName }}</span>  </td>
                        <td>{{ $parcel->invoice_no }}</td>
                        <td>{{ $parcel->created_at->format('d/m/Y') }}</td>
                        <td>{{ $parcel->totalcosts }} TK</td>
                        <td class="d-flex justify-content-center">
                            @if ($parcel->status == 'pending')
                                <button class= "statusCommonButton pending mr-2">Pending</button>
                            @elseif ($parcel->status == 'cancel')
                                <button class="statusCommonButton cancel ">Canceled</button>
                            @elseif ($parcel->status == 'delivery')
                                <button class="statusCommonButton delivery">Delivered</button>
                            @elseif ($parcel->status == 'picked')
                                <button class="statusCommonButton picked">Picked</button>
                            @endif
                            <span class="ml-3">
                                <div class="dropdown">
                                    <button class="btn btn-info btn-lg rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="{{ route('adminSinglePersonalParcel', $parcel->id) }}">View</a>
                                      <a class="dropdown-item area_cost_delete_btn" data-id="{{ $parcel->id }}">Delete</a>
                                    </div>
                                </div>
                            </span>
                        </td>
                    </tr>
                    @empty
                        <span style="color: red; font-weight:bold; margin-bottom:20px; display:block">Empty Parcel</span>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr class="active">
                        <td colspan="6">
                            <div class="text-right">
                                <ul class="pagination pagination-split justify-content-end footable-pagination m-t-10 m-b-0"></ul>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
@section('admin_footer_script')
    <script>
        $('.area_cost_delete_btn').click(function(){
            let id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                    });
                    $.ajax({
                        type:'GET',
                        url: '/All/Personal/Parcel/delete/'+id,
                        dataType: 'json',
                        success: function(data){
                            window.location.reload(true);

                        },
                        error: function(data){
                            console.log(data);
                        }
                    })

                } else {
                    swal("Your imaginary file is safe!");
                }
            });
        });
    </script>
@endsection
