@include('frontend.inc.header')
<section class="create-account-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="create-account-wrapper reset-password business-info custom__create__wrapper">
            <h4>Personal Information</h4>
            <div class="reset-password-form">
              <form method="POST" action="{{ route('register') }}">
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
                      <label for="current_password" class="form-label">Gender</label>
                        <select name="gender" class="form-control login__gender  @error('gender') is-invalid @enderror">
                            <option label="--Choose One--"></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                        @error('gender')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 text-start">
                      <label for="current_password" class="form-label">Address</label>
                      <input name="address" type="text" class="form-control" placeholder="Address"> 
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


