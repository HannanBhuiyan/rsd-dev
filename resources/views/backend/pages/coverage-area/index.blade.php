@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div >
            <div class="tile_inner_box">
                <h4 class="header-title mb-4">Area List</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                      <li class="breadcrumb-item" aria-current="page"><a style="color:#ED1C24; font-weight:700" href="#">Area</a></li>
                    </ol>
                </nav>
                <div class="add_new_district text-right">
                    <a href="{{ route('coverageArea.create') }}">Add New Area</a>
                </div>
                <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-bordered  text-center" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>SL.NO</th>
                                <th>District Name</th>
                                <th>Area Name</th>
                                <th>Area Code</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($areas as $area)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{  $area->relationInDistrict->district_name }} 
                                @if ($area->relationInCostArea->count())
                                    <span style="color:red"> (Cost Include) </span>
                                @endif
                                </td>
                                <td>{{ $area->area_name }}</td>
                                <td>{{ $area->area_code }}</td>
                                <td>
                                    @if ($area->status == 1)
                                        <span class="delivery-btn">Active</span>
                                    @else
                                        <span class="delivery-btn ca">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($area->status == 1)
                                        <a href="{{ route('coverageArea.inactive', $area->id) }}" class="btn btn-warning mr-2">Inactive</a>
                                    @else
                                        <a href="{{  route('coverageArea.active', $area->id) }}" class="btn btn-success mr-2">Active</a>
                                    @endif
                                    <a data-id="{{ $area->id }}"  class="btn btn-danger mr-2 district_delete_btn">Delete</a>
                                    <a href="{{ route('coverageArea.edit', $area->id ) }}" class="btn btn-info">Edit</a>
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
                        url: 'coverageArea/delete/'+id,
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
