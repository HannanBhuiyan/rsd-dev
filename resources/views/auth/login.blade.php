@include('frontend.inc.header')

<section class="create-account-area ">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="create-account-wrapper reset-password custom__create__wrapper">
            <h4>{{ __('Login In Your Account') }}</h4>
            
              @if(Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
              @endif
            
            <div class="reset-password-form">
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3 text-start">
                    <label for="phone" class="form-label">Mobile Number</label>
                    <input type="test" placeholder="Enter your mobile number" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{ old('phone') }}">
                    <div class="div mt-2">
                        @error('phone')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 text-start">
                  <label  class="form-label ">{{ __('Password') }}</label>
                  <input type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password">
                    <div class="div mt-2">
                        @error('password')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 captchclass">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn">{{ __('Login') }}</button>
                <br>
                <div class="forget_pass mt-3">
                    @if (Route::has('password.request'))
                        <a class="btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
              </form>
              <div class="div create_account_link">
                  <p>Create an account? <a href="{{ route('create.account') }}">Sign Up</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@include('frontend.inc.footer')
