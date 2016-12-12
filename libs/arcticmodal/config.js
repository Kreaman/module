(function($) {
    $(function() {
      if (!$.cookie('smartCookies')) {

        function getWindow(){
          $('.offer').arcticmodal({
            closeOnOverlayClick: false,
            closeOnEsc: true
          });
        };

        setTimeout (getWindow, 15000);
      }



    })
  })(jQuery)