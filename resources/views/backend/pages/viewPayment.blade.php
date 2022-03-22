@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <h4 class="m-t-0 header-title v-payment">View Payment</h4>
        <div class="card-box table-responsive">
            <table id="datatable-buttons" class="table table-bordered  text-center" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Total Cost</th>
                        <th>Action</th>   
                    </tr>
                </thead>
                <tbody>
                    @foreach ($parcels as $parcel)
                    <tr>
                        <td>{{ $parcel->invoice_no }}</td>
                        <td>{{ $parcel->created_at->format('d/m/Y') }}</td>
                        <td>{{ $parcel->totalcosts }} Tk</td>
                        <td>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>   
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

