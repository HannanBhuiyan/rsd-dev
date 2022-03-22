@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="m-t-0 header-title v-payment">View Message</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('message.view') }}">All Message</a></li>
              <li class="breadcrumb-item" aria-current="page"><a style="color:#ED1C24; font-weight:700" href="#">View</a></li>
            </ol>
        </nav>
        <div class="card-box">
            <table class="table table-bordered" >
                <tr>
                    <th>Name</th>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $data->email }}</td>
                </tr> 
                <tr>
                  <th>Message</th>
                  <td>{{ $data->message }}</td>
                </tr> 
            </table>
        </div>
    </div>
</div>
@endsection


