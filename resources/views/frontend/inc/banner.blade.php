  <!-- Banner section start here -->
  <div class="banner_section">
    <div class="container">
      <div class="banner_area">
        <div class="row">
          <div class="col-md-6 col-12">
            <div class="banner_content">
                <h2>{{ __('bannertitle') }} <span class="pascal_color"></span></h2>
              <p>{{ __('subtitle') }}</p>
                <a href="{{ route('create.account') }}" class="btn">{{ __('Join Merchant') }}</a>
                <a class="play-icon" data-bs-toggle="modal" href="#exampleModalToggle"> <i class="fas fa-play"></i></a>
            </div>
          </div>
          <div class="col-md-6 col-12">
            <div class="banner_image">
              <img src="{{ asset('frontend') }}/assets/images//banner/banner.png" alt="bannerimage">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner section ending here -->
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body">
            <video width="100%" height="800" controls>
                <source src="{{ asset('frontend') }}/assets/video/rsd.mp4" type="video/mp4">
            </video>
        </div>
      </div>
    </div>
  </div>
  <!-- responsive order review -->
  {{-- <div class="responsive_banner_review">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="banner_review_right">
            <div class="banner_gift_image">
              <img src="{{ asset('frontend') }}/assets/images/banner/giftbox.png" alt="iamge">
            </div>
            <div class="gift_img_footer">
               <div class="gift_iamge_text">
                  <h4>Check Receipts</h4>
                  <h6>Check from anywhere</h6>
               </div>
               <div class="gift_image_icon">
                  <i class="fas fa-play"></i>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- responsive order review -->