
@include('frontend.inc.header')



<section class="create-account-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="create-account-wrapper reset-password custom__create__wrapper">
            <h4>{{ __('Reset Your Password') }}</h4>
            <div class="reset-password-form">
              <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="mb-3 text-start">
                  <label for="current_password" class="form-label ">{{ __('Email') }}</label>
                  <input type="email" name="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" id="current_password" value="{{ $email ?? old('email') }}">
                  <div class="div mt-2">
                    @error('email')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
                <div class="mb-3 text-start">
                  <label for="current_password" class="form-label">{{ __('New Password') }}</label>
                  <input type="password" name="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" id="current_password" >
                    @error('password')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 text-start">
                  <label for="current_password" class="form-label">{{ __('Confirm Passord') }}</label>
                  <input type="password" placeholder="Enter your confirm password" name="password_confirmation" class="form-control" id="current_password">
                </div>

                <button type="submit" class="btn">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@include('frontend.inc.footer')







