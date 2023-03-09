 <!-- Body Wrapper End Here -->
 <!-- jQuery-V1.12.4 -->
 <script src="{{ asset('frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
 <!-- Popper js -->
 <script src="{{ asset('frontend/js/vendor/popper.min.js') }}"></script>
 <!-- Bootstrap V4.1.3 Fremwork js -->
 <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
 <!-- Ajax Mail js -->
 <script src="{{ asset('frontend/js/ajax-mail.js') }}"></script>
 <!-- Meanmenu js -->
 <script src="{{ asset('frontend/js/jquery.meanmenu.min.js') }}"></script>
 <!-- Wow.min js -->
 <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
 <!-- Slick Carousel js -->
 <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
 <!-- Owl Carousel-2 js -->
 <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
 <!-- Magnific popup js -->
 <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
 <!-- Isotope js -->
 <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
 <!-- Imagesloaded js -->
 <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
 <!-- Mixitup js -->
 <script src="{{ asset('frontend/js/jquery.mixitup.min.js') }}"></script>
 <!-- Countdown -->
 <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
 <!-- Counterup -->
 <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
 <!-- Waypoints -->
 <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
 <!-- Barrating -->
 <script src="{{ asset('frontend/js/jquery.barrating.min.js') }}"></script>
 <!-- Jquery-ui -->
 <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
 <!-- Venobox -->
 <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
 <!-- Nice Select js -->
 <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
 <!-- ScrollUp js -->
 <script src="{{ asset('frontend/js/scrollUp.min.js') }}"></script>
 <!-- Main/Activator js -->
 <script src="{{ asset('frontend/js/main.js') }}"></script>
 <script src="{!! asset('backend/plugins/select2/js/select2.min.js') !!}"></script>
 <!-- toastr -->
 <script src="{!! asset('backend/plugins/toastr/toastr.min.js') !!}"></script>
 <script>
     toastr.options.closeButton = true;
     @if (session('success'))
         var message = "{{ session('success') }}";
         toastr.success(message, {
             timeOut: 2000
         });
     @endif
     @if (session('error'))
         var message = "{{ session('error') }}";
         toastr.error(message, {
             timeOut: 2000
         });
     @endif
     setTimeout(function() {
         toastr.clear()
     }, 3000);
     $(document).ready(function() {

         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         //Initialize Select2 Elements
         $('.select2').select2();
     });
 </script>
 @stack('sripts')
