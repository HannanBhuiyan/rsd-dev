  <!-- Js heres -->
  <script src="{{ asset('frontend') }}/assets/js/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/swiper-bundle.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/select2.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/script.js"></script>
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
  @yield('footer_script')
</body>
</html>
