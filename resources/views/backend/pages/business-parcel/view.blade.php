@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="m-t-0 header-title v-payment">View Business Parcel</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('business.parcel.index') }}">All Parcel</a></li>
              <li class="breadcrumb-item" aria-current="page"><a style="color:#ED1C24; font-weight:700" href="#">View</a></li>
            </ol>
        </nav>
        <div class="card-box">
            <table class="table table-bordered" >
                <tr>
                    <th>From</th>
                    <td>{{ $data->fromarea }}</td>
                </tr>
                <tr>
                    <th>To</th>
                    <td>{{ $data->toarea }}</td>
                </tr>
                <tr>
                    <th>Recipient Name</th>
                    <td>{{ $data->recipientName }}</td>
                </tr>
                <tr>
                    <th>Recipient Phone</th>
                    <td>{{ $data->recipientPhone }}</td>
                </tr>
                <tr>
                    <th>Porduct Type</th>
                    <td>{{ $data->PorductitemName }}</td>
                </tr>
                <tr>
                    <th>Porduct Weight</th>
                    <td>{{ $data->weight }}KG</td>
                </tr>
                <tr>
                    <th>Recipient Address</th>
                    <td>{{ $data->recipientAdd }}</td>
                </tr>
                <tr>
                    <th>Note</th>
                    <td>{{ $data->recipientnote }}</td>
                </tr>
                <tr>
                    <th>Invoice No</th>
                    <td>{{ $data->invoice_no }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $data->created_at->format('d/m/Y') }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td> 
                        @if ($data->status == 'pending')
                        <button class= "statusCommonButton pending mr-2">Pending</button>
                        <a class="statusCommonButton cancel" href="{{ route('personal.parcel.cancel', $data->id) }}">Cancel</a>
                        @elseif ($data->status == 'cancel')
                        <button class="statusCommonButton cancel ">Canceled</button>
                        @elseif ($data->status == 'delivery')
                        <button class="statusCommonButton delivery">Delivered</button>
                        @elseif ($data->status == 'picked')
                        <button class="statusCommonButton picked">Picked</button>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection

