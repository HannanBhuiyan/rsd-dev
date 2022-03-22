@include('frontend.inc.header')



<section class="create-account-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
          <div class="create-account-wrapper reset-password custom__create__wrapper">
            <h4>{{ __('Reset Password') }}</h4>
            <div class="reset-password-form">
              <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-3 text-start">
                  <label for="current_password" class="form-label ">{{ __('Email') }}</label>
                  <input type="password" placeholder="Enter your email" name="email" class="form-control @error('email') is-invalid @enderror" id="current_password" value="{{ old('email') }}" required>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn">{{ __('Send Password Reset Link') }}</button>
              </form>
            </div>


          </div>
        </div>
      </div>
    </div>
  </section>



{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">


                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link fsadfsd') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@include('frontend.inc.footer')
