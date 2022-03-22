@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="m-t-0 header-title v-payment">All Summary</h4>
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
                        <th data-toggle="true">Name</th>
                        <th data-hide="phone">Email</th>
                        <th data-hide="phone, tablet">Message</th>
                        <th data-hide="phone, tablet">Time</th>
                        <th data-hide="phone, tablet">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                      <tr @if ($message->status == 1)   style="color: red"  @endif>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ Str::substr($message->message, 0, 80)  }} ...</td>
                        <td>{{ $message->created_at->diffForHumans() }}</td>
                        <td>
                          <a class="btn btn-info" href="{{ route('message.single.view', $message->id) }}">View</a>
                          <a data-id="{{ $message->id }}" class="btn btn-danger messageDelete">Delete</a>
                        </td>
                    </tr>
                    @empty
                        <span style="color: red; font-weight:bold; margin-bottom:20px; display:block">Empty Message</span>
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
        $('.messageDelete').click(function(){
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
                        url: '/support/message/delete/'+id,
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
 