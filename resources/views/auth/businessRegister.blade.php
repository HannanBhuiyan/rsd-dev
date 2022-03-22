@include('frontend.inc.header')
<section class="create-account-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="create-account-wrapper reset-password business-info custom__create__wrapper">
            <h4>Business Information</h4>
            <div class="reset-password-form">
              <form method="POST" action="{{ route('business.register.store') }}">
                @csrf
                <div class="row justify-content-center">
                  <div class="col-md-6">
                    <div class="mb-3 text-start">
                      <label for="current_password" class="form-label ">First Name</label>
                      <input type="text" placeholder="Enter your First Name" name="fname" value="{{ old('fname') }}" class="form-control @error('fname') is-invalid @enderror" id="current_password">
                      <div class="div mt-2">
                        @error('fname')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3 text-start">
                      <label for="current_password" class="form-label">E-mail</label>
                      <input type="email" placeholder="Enter your E-mail" name="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" id="current_password">
                      <div class="div mt-2">
                        @error('email')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3 text-start">
                      <label for="current_password" class="form-label">Phone</label>
                      <input type="tel" placeholder="Enter your Phone" name="phone" value="{{ old('phone') }}" class="form-control  @error('phone') is-invalid @enderror" id="current_password">
                      <div class="div mt-2">
                        @error('phone')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3 text-start">
                        <label class="form-label">Facebook Page Link </label>
                        <input type="text" placeholder="Http:://" name="fb_page_link" class="form-control">
                        <div class="div mt-2">
                          @error('fb_page_link')
                              <span class="text-danger">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                    </div>
                    <div class="mb-3 text-start">
                      <label for="current_password" class="form-label ">Password</label>
                      <input type="password" placeholder="Enter your password" name="password" value="{{ old('password') }}" class="form-control  @error('password') is-invalid @enderror" id="current_password">
                      <div class="div mt-2">
                        @error('password')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3 text-start">
                      <label for="current_password" class="form-label">Last Name</label>
                      <input type="text" placeholder="Enter your Last Name" name="lname" value="{{ old('lname') }}" class="form-control  @error('lname') is-invalid @enderror" id="current_password">
                      <div class="div mt-2">
                        @error('lname')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="current_password" class="form-label">Shop Address</label>
                        <input type="text" placeholder="Enter your Confirm Password" name="shop_address" class="form-control" id="current_password">
                        @error('shop_address')
                              <span class="text-danger">
                                  <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                    </div> 
                    <div class="mb-3 text-start">
                        <label for="current_password" class="form-label">Ecommerce registration ID</label>
                        <input type="text" placeholder="Ecommerce registration ID" name="ecommerce_register_id" class="form-control" id="current_password">
                        @error('ecommerce_register_id')
                              <span class="text-danger">
                                  <strong>{{ $message }}</strong>
                              </span>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                      <label for="current_password" class="form-label">Confirm Password</label>
                      <input type="password" placeholder="Enter your Confirm Password" name="password_confirmation" class="form-control" id="current_password">
                      @error('password_confirmation')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn">Done</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@include('frontend.inc.footer')


