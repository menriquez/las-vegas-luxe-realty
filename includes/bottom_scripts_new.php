    <!-- scripting (at the bottom for faster loading) -->

    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/bootstrap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/jquery.smooth-scroll.js"></script>



    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>

    <script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>

    <div></div>    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/mail_validation.js"></script>

    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/function.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/library.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/jquery.royalslider.min.js"></script>
    <script type="text/javascript" src="<?= $BASE_WEB_URL ?>/js/accordion.js"></script>

    <!-- External libraries: jQuery & GreenSock -->
    <!-- <script src="<?= $BASE_WEB_URL ?>/layerslider/js/jquery.js" type="text/javascript"></script> -->
    <script src="<?= $BASE_WEB_URL ?>/js/layerslider/js/greensock.js" type="text/javascript"></script>
    <script src="<?= $BASE_WEB_URL ?>/js/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
    <script src="<?= $BASE_WEB_URL ?>/js/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>

    <!-- Layer Slider JS controller (view documentation for refrence) -->
    <script type="text/javascript">
      // Running the code when the document is ready
      $(document).ready(function(){
        // Calling LayerSlider on the target element
        $('#layerslider').layerSlider({

          skin:'lightskin'

          // Slider options goes here,
          // please check the 'List of slider options' section in the documentation

        });

      });
    </script>
    <!-- /End  Layer Slider JS controller -->

    <!--Scroll Reveal Classes -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/scrollreveal.js/3.1.1/scrollreveal.min.js"></script>
    <script>
      var up = {
        delay    : 200,
        distance : '120px',
        easing   : 'ease-in-out',
        scale    : 1.1,
      };
      var down = {
        delay    :100,
        distance :"50px",
        easing   :"ease-in",
        scale    :1,
        origin   :"top",
      };

      var appear ={
        delay      :400,
        distance   :"50px",
        easing    :"ease-out",
        scale      : 1,

      };
      var header = {
        origin: "bottom",
        duration: 300,
      };

      var easeLeft = {
        origin     :"right",
        distance   :"50px",
        delay      :200,
        duration   :500,

      };
      var easeRight = {
        origin     :"left",
        distance   :"50px",
        delay      :200,
        duration   :500,

      };
      window.sr = ScrollReveal();
      sr.reveal(".sr-header", header);
      sr.reveal(".box-seq", { duration: 800 }, 200);
      sr.reveal(".jump", up, 100 );
      sr.reveal(".jump-container", {delay: +100},up);
      sr.reveal(".appear", appear);
      sr.reveal(".ease-left-1", easeLeft,100);
      sr.reveal(".ease-right-1", easeRight,100);
      sr.reveal(".ease-left-2", easeLeft,150);
      sr.reveal(".ease-right-2", easeRight,150);
      sr.reveal(".sr-down", down);

    </script>
    <script src="<?= $BASE_WEB_URL ?>/js/toastr.js" type="text/javascript"></script>

    <script type="text/javascript">

        function toggleShowHide(elementId) {
            var element = document.getElementById(elementId);
            if (element) {
                if (element.style.display == "none")
                    element.style.display = "inline";
                else
                    element.style.display = "none";
            }
        }

    </script>


    <!-- /End Scroll Reveal js -->


<!-- /end scripting -->
