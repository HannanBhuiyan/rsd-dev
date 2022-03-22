@extends('layouts.frontend-master')
@section('content')
<div class="delivery__tracking__section">
  <div class="container">
      <div class="delivery__tracking_area">
          <div class="row">
              <div class="col-md-12 m-auto">
                  <div class="delivery__tracking_inner">
                      <div class="delivery__tracking__top text-center">
                          <img src="{{ asset('frontend') }}/assets/images/parcellogo.png" alt="logo">
                      </div>
                      <div class="delivery__tracking__middle">
                          <div class="delivery__title text-center">
                              <h2>Parcel Delivered</h2>
                          </div>
                            <div class="delivery__tracking__middle_main text-md-center">
                                @if ($parcelStatus->status == 'pending')
                                    <div class="delivery__tracking__item"> 
                                        <i class="fas fa-check delivery_active"></i>
                                        <div class="d__text">
                                            <p>Order Processing</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                    <div class="delivery__tracking__item">
                                        <i class="fas fa-check"></i>
                                        <div class="d__text">
                                            <p>In Transit</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                    <div class="delivery__tracking__item">
                                        <i class="fas fa-check"></i>
                                        <div class="d__text">
                                            <p>Out For Delivery</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                    <div class="delivery__tracking__item">
                                        <i class="fas fa-check"></i>
                                        <div class="d__text">
                                            <p>Delivered</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                    @elseif ($parcelStatus->status == 'picked')
                                    <div class="delivery__tracking__item"> 
                                        <i class="fas fa-check delivery_active"></i>
                                        <div class="d__text">
                                            <p>Order Processing</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                    <div class="delivery__tracking__item">
                                        <i class="fas fa-check delivery_active"></i>
                                        <div class="d__text">
                                            <p>In Transit</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                    <div class="delivery__tracking__item">
                                        <i class="fas fa-check"></i>
                                        <div class="d__text">
                                            <p>Out For Delivery</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                    <div class="delivery__tracking__item">
                                        <i class="fas fa-check"></i>
                                        <div class="d__text">
                                            <p>Delivered</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                    @elseif ($parcelStatus->status == 'delivery')
                                    <div class="delivery__tracking__item"> 
                                        <i class="fas fa-check delivery_active"></i>
                                        <div class="d__text">
                                            <p>Order Processing</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                    <div class="delivery__tracking__item">
                                        <i class="fas fa-check delivery_active"></i>
                                        <div class="d__text">
                                            <p>In Transit</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                    <div class="delivery__tracking__item">
                                        <i class="fas fa-check delivery_active"></i>
                                        <div class="d__text">
                                            <p>Out For Delivery</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                    <div class="delivery__tracking__item">
                                        <i class="fas fa-check delivery_active"></i>
                                        <div class="d__text">
                                            <p>Delivered</p>
                                            <h6>19 March</h6>
                                        </div>
                                    </div>
                                @endif
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection