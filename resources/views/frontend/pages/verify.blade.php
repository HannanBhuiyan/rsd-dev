@include('frontend.inc.header')
<section class="create-account-area custom__create__area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="create-account-wrapper otp custom__create__wrapper">
            <h4>Verify Phone Number</h4>
            <span class="otp-verify-number">Please enter the 4 digit one-time password (OTP) that <br>
                we’ve sent you at <span class="otp-number">
                    @php
                        $result = \App\Models\User::latest()->first()->phone;
                        $id = \App\Models\User::latest()->first()->id;
                        echo $result;
                    @endphp
                </span>
                <input type="text"  name="phone" id="opt-number">
                <p id="otp-action">Edit </p>
                <p id="otp-action" data-id="{{ $id }}" class="otp-save">Save </p>
            </span>
              <div class="otp-form">
                <form action="{{  route('verifyOTP') }}" method="POST">
                    @csrf
                    <input type="text" name="code[]">
                    <input type="text" name="code[]" class="mt-3 mt-md-0">
                    <input type="text" name="code[]" class="mt-3 mt-md-0">
                    <input type="text" name="code[]" class="mt-3 mt-md-0">
                    <button type="submit" class="btn btn-otp">Verify</button>
                </form>
                <span class="have_account">Din’s receive the OTP yet?  <a href="{{ route('resend.otp') }}">Resend OTP</a></span>
              </div>
            <span class="have_account">By Logging in you agree to our  <a href="#">Term & Conditions?</a></span>
          </div>
        </div>
      </div>
    </div>
  </section>
  @section('footer_script')
  <script>
        $('.otp-save').click(function(){
            let dataId = $(this).attr('data-id');
            let phone = $('#opt-number').val();
            $.ajax({
                type: 'POST',
                url: '/edit/phone/'+dataId,
                dataType: 'json',
                data: {phone: phone},
                success: function (data) {
                    $('.otp-number').html(data[0]);
                },
                error: function (data) {
                    console.log('error');
                }
            });
        })
  </script>
  @endsection
@include('frontend.inc.footer')
