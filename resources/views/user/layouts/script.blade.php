<!-- Bootstrap core JavaScript -->
    <script src="{{ asset('asset-user/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('asset-user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    
    <!-- Scroll Top -->
    <image title="Go to top" type="button" onclick="topFunction()" id="scroll-top" src="{{ asset('asset-user/images/scroll-top.png')}}" />
    <script>
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
              document.getElementById("scroll-top").style.display = "block";
          } else {
              document.getElementById("scroll-top").style.display = "none";
          }
      }
      function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
      }
    </script>