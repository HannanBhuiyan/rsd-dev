<!-- treak product section start here -->
<div class="track_product_section">
    <div class="container">
      <div class="track_product_area">
        <div class="track_product_header">
          <h2>{{ __('Track Your Product') }}</h2>
          <p>{{ __('trackDesc') }}</p>
        </div>
        <div class="track_product_form">

        <form action="{{ route('order.track') }}" method="get">
          <div class="row track_custom_row">
            <div class="col-xl-4 col-md-6 col-12">
              <input type="text" name="invoice_no" placeholder="{{ __('Invoice ID') }}">
            </div>
            <div class="col-xl-4 col-md-6 col-12">
              <input type="text" name="email" placeholder="{{ __('Email') }}">
            </div>
            <div class="col-xl-3 col-md-6 col-12">
              <div class="track_button">
                <button type="submit" class="btn trackbtn">{{ __('Track Your Product') }}</button>
              </div>
            </div>
          </div> 
          </form>

        </div>
      </div>
    </div>
  </div>
<!-- treak product section ending here -->



