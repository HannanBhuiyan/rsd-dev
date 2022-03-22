@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div >
            <div class="tile_inner_box">
                <h4 class="header-title mb-4">Area Cost</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item" aria-current="page"><a style="color:#ED1C24; font-weight:700" href="#">Area Cost</a></li>
                    </ol>
                </nav>
                <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-bordered  text-center" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>SL.NO</th>
                                <th>Area Name</th>
                                <th>Cost</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($costs as $cost)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $cost->relationWithCoverageArea->area_name }}</td>
                                <td>{{ $cost->cost }}</td>
                                <td>
                                    <a data-id="{{ $cost->id }}"  class="btn btn-danger mr-2 area_cost_delete_btn">Delete</a>
                                    <a href="{{ route('cost.edit', $cost->id ) }}" class="btn btn-info">Edit</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
                        url: 'cost/delete/'+id,
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
