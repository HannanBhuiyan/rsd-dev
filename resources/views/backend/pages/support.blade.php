@extends('layouts.backend-master')
@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <div class="tile_inner_box">
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-xl-9 ">
                        <h4 class="header-title mb-4">Support</h4>
                        <div class="add_new_parcel_item">
                            <form action="{{ route('support.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                        <input type="text" name="name" placeholder="Enter Your First Name">
                                    </div> 
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="text" name="email" placeholder="Enter your email">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Message <span style="color:#D3D3D3">(Maximum 500 Charecter)</span></label>
                                        <textarea name="message" id="" rows="17" placeholder="Write your message..."></textarea>
                                    </div>
                                    <div class="add_new_parcel_button mt-3">
                                        <button type="submit">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                     </div>
                     <div class="col-xs-12 col-md-12 col-xl-3">
                        <h4 class="header-title mb-4">Contact</h4>
                        <div class="contact_left">
                            <div class="contact_item">
                                <div class="contact_icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="contact_text">
                                    <p>+88 01923 00 00 00</p>
                                    <p>+88 01923 00 00 00</p>
                                </div>
                            </div>
                            <div class="contact_item">
                                <div class="contact_icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="contact_text">
                                    <p>info@gmail.com</p>
                                    <p>info@gmail.com</p>
                                </div>
                            </div>
                            <div class="contact_item">
                                <div class="contact_icon">
                                    <i class="fa fa-map"></i>
                                </div>
                                <div class="contact_text">
                                    <p>16/2, Purana Paltan Line, Aristofarma Road 1000, Dhaka, Dhaka Division,  Bangladesh</p >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>
@endsection

