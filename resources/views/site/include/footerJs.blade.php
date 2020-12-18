<!-- JS Libs & Plugins
  ============================================ -->
  <script src="{{url('theme/rawbee')}}/js/libs/jquery.modernizr.js"></script>
  <script src="{{url('theme/rawbee')}}/js/libs/jquery-2.2.4.min.js"></script>
  <script src="{{url('theme/rawbee')}}/js/libs/jquery-ui.min.js"></script>
  <script src="{{url('theme/rawbee')}}/js/libs/retina.min.js"></script>
  <script src="{{url('theme/rawbee')}}/plugins/jquery.scrollTo.min.js"></script>
  <script src="{{url('theme/rawbee')}}/plugins/jquery.localScroll.min.js"></script>
  <script src="{{url('theme/rawbee')}}/plugins/jquery.queryloader2.min.js"></script>
  <script src="{{url('theme/rawbee')}}/plugins/bootstrap.js"></script>
  <script src="{{url('theme/rawbee')}}/plugins/owl.carousel.min.js"></script>


  <!-- JS theme files
  ============================================ -->
  <script src="{{url('theme/rawbee')}}/js/plugins.js"></script>
  <script src="{{url('theme/rawbee')}}/js/script.js"></script>



  <script type="text/javascript">

      $(".submit_button").click(function () {
          // alert(1);
              $.ajax({
                  url: '{{ url('remove-from-cart') }}',
                  method: "DELETE",
                  data: {_token: '{{ csrf_token() }}', id: 1},
                  success: function (response) {
                      window.location.reload();
                  }
              });
      });

  </script>
