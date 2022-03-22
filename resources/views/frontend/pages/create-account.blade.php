@include('frontend.inc.header')
<section class="create-account-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="create-account-wrapper">
            <h4>Create Your Account</h4>
            <a href="{{ route('register') }}" class="btn btn-2">Personal Profile</a>
            <a href="{{ route('business.register') }}" class="btn">Business Profile</a>
            <span class="have_account">Already have an account? <a href="{{ route('login') }}">Login</a></span>
          </div>
        </div>
      </div>
    </div>
  </section>
@include('frontend.inc.footer')
