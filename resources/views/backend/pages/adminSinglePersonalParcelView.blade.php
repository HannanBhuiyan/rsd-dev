@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="m-t-0 header-title v-payment">Personal View</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('allPersonalParcelView') }}">All Parcel</a></li>
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
                            <a class="statusCommonlinkButton picked mr-2" href="{{ route('personal.parcel.picked', $data->id) }}">Picked</a>
                            <a class="statusCommonlinkButton cancel"  href="{{ route('personal.parcel.cancel', $data->id) }}">Cancel</a>
                        @elseif ($data->status == 'delivery')
                            <span class="deliveredtext">Delivered</span>
                        @elseif ($data->status == 'picked')
                            <a class="statusCommonlinkButton delivery mr-2" href="{{ route('personal.parcel.deliver', $data->id) }}">Delivery</a> 
                            <a  class="statusCommonlinkButton cancel" href="{{ route('personal.parcel.cancel', $data->id) }}">Cancel</a> 
                        @elseif ($data->status == 'cancel')
                            <span class="canceledtext">Canceled</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection


