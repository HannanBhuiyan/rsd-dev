@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="m-t-0 header-title v-payment">All Editor</h4>
        <div class="card-box">
            <div class="mb-3">
                <div class="row">
                    <div class="col-12 text-sm-center form-inline">
                        <div class="form-group">
                            <input id="demo-foo-search" type="text" placeholder="Search" class="form-control" autocomplete="on">
                        </div>
                    </div>
                </div>
            </div>
            <table id="demo-foo-filtering" class="table text-center table-bordered toggle-circle m-b-0" data-page-size="7">
                <thead>
                    <tr>
                        <th data-toggle="true">Editor Image</th>
                        <th>Name</th>
                        <th data-hide="phone">Email</th>
                        <th data-hide="phone, tablet">Phone</th>
                        <th>Role</th>
                        <th data-hide="phone, tablet">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($editorData as $data)
                    <tr>
                      <th><img width="100px" height="100px" src="{{ asset($data->image) }}" alt="img"></th>
                      <th>{{ $data->fname }} {{ $data->lname }}</th>
                      <td>{{ $data->email }}</td>
                      <td>{{ $data->phone }}</td>
                      <td>
                        <select name="" id="" onchange="location = this.value">
                          <option label="--Change Role--"></option>
                          <option value="{{ route('admin.role.change', $data->id) }}">Admin</option>
                          <option value="{{ route('editor.role.change', $data->id) }}">Editor</option>
                          <option value="{{ route('user.role.change', $data->id) }}">User</option>
                          <option value="{{ route('merchant.role.change', $data->id) }}">Merchant</option>
                        </select>
                      </td>
                      <td>
                        @if ($data->active == 1)
                            <a class="btn btn-success" href="{{ route('banned', $data->id) }}">Banned</a>
                        @endif
                            <a data-id="{{ $data->id }}" class="roleDeletebtn btn btn-danger">Delete</a>
                      </td>
                    </tr> 
                    @empty
                        <span style="color: red; font-weight:bold; margin-bottom:20px; display:block">Empty Role</span>
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
        $('.roleDeletebtn').click(function(){
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
                        url: '/role/delete/'+id,
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

 
