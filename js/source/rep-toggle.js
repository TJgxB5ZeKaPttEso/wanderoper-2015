// --> Repertoire jQuery Setup

(function ($) {


    jQuery(document).ready(function () {

        $(".slider-tab-wrapper").css("display","none");

        // --> Repertoire jQuery Setup
        var repertoireItem = $("a:contains('Repertoire')");
        repertoireItem.click(function(e) {
            var width = $(window).width();
            if ( width < 600 ) {
                return;
            } else {
                e.preventDefault();
                $(".slider-tab-wrapper").slideToggle("spring");
            }
        });


        // <-- Repertoire jQuery Setup
    });




})(jQuery);
// <-- Repertoire jQuery Setup
