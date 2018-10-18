//------------------------------------------
    //slider
//------------------------------------------
jQuery(document).ready(function() {
  jQuery("#ta-slider").owlCarousel({
      navigation : true, // Show next and prev buttons
      slideSpeed : 200,
      pagination : true,
      paginationSpeed : 400,
      singleItem:true,
      video:true,
      autoPlay : true,
      transitionStyle : "backSlide",
      navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ]
    });
});
//------------------------------------------
    //service
//------------------------------------------

jQuery(document).ready(function() {
    jQuery(function(){
          jQuery(".ta-service").slice(0, 3).show(); // select the first ten
          jQuery("#load-service").click(function(e){ // click event for load more
            e.preventDefault();
            jQuery( "#ta-port-load-ser" ).addClass("ta-port-load-show-ser");
            jQuery( "#ta-port-load-ser" ).animate(
            { 
              display:"block"
            }
            , 500, 
            function() {
                  // Animation complete.
                    jQuery(".ta-service:hidden").slice(0, 4).show(); // select next 10 hidden divs and show them
                    if(jQuery(".ta-service:hidden").length === 0){ // check if any hidden divs still exist
                        jQuery("#load-service").text("No more"); // alert if there are none left
                      }
                      jQuery( "#ta-port-load-ser" ).removeClass("ta-port-load-show-ser");
                    }
                    );
          });
        });

}); 

//------------------------------------------
    //scroll-top
//------------------------------------------
  jQuery(".ti_scroll").hide();   
    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 500) {
                jQuery('.ti_scroll').fadeIn();
            } else {
                jQuery('.ti_scroll').fadeOut();
            }
        });     
        jQuery('a.ti_scroll').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });   