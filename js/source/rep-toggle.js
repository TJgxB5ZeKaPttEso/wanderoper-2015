// --> Repertoire jQuery Setup

(function ($) {


    jQuery(document).ready(function () {

        $(".slider-tab-wrapper").css("display","none");

        // --> Repertoire jQuery Setup
        var repertoireItem = $("a:contains('Repertoire')");
        repertoireItem.click(function(e) {
            e.preventDefault();
            $(".slider-tab-wrapper").slideToggle("fast");
        });


        // <-- Repertoire jQuery Setup
    });




})(jQuery);
// <-- Repertoire jQuery Setup