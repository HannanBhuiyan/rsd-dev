@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div >
            <div class="tile_inner_box">
                <h4 class="header-title mb-4">District List</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item" aria-current="page"><a style="color:#ED1C24; font-weight:700" href="#">District</a></li>
                    </ol>
                </nav>
                <div class="add_new_district text-right">
                    <a href="{{ route('coverageDistrict.create') }}">Add New District</a>
                </div>
                <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-bordered  text-center" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>SL.NO</th>
                                <th>District Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($districts as $district)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $district->district_name }} <span style="color:#ED1C24">({{ $district->relationInCoverageArea->count() }})</span></td>
                                <td>
                                    @if ($district->status == 1)
                                        <span class="delivery-btn">Active</span>
                                    @else
                                        <span class="delivery-btn ca">Inactive</span>
                                    @endif
                                </td>
                                <td> 
                                    <a data-id="{{ $district->id }}"  class="btn btn-danger mr-2 district_delete_btn">Delete</a>
                                    <a href="{{ route('coverageDistrict.edit', $district->id ) }}" class="btn btn-info">Edit</a>
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
        $('.district_delete_btn').click(function(){
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
                        url: 'coverageDistrict/delete/'+id,
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
