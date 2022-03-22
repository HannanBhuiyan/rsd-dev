@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="m-t-0 header-title v-payment">All Merchant</h4>
        <div class="card-box">
          <table class="table table-bordered">
            <thead>
              <tr> 
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>ONLINE/OFFLINE</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($merchantData as $data)
                <tr>
                  <th><img width="100px" height="100px" src="{{ asset($data->image) }}" alt="img"></th>
                  <th>{{ $data->fname }} {{ $data->lname }}</th>
                  <td>{{ $data->email }}</td>
                  <td>{{ $data->phone }}</td>
                  <td>
                    @if ($data->isOnline())
                      <li class="text-success">Online</li>
                    @else
                      <li class="text-danger">Offline <br>({{ Carbon\Carbon::parse($data->last_seen)->diffForHumans() }})</li>
                    @endif
                  </td>
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
              @endforeach
            </tbody>
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
