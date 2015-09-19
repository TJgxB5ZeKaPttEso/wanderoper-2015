(function($) {

	// all Javascript code goes here



    // -->

    jQuery(document).ready(function() {


        // added
        var revapi = jQuery('#rev_slider_1_1').show().revolution(
            {

            });

        // event for when slider has been loaded
        revapi.on('revolution.slide.onloaded', function() {
            console.log('slider loaded');



            // slider loaded

        });

        // event for when slide is changed
        revapi.on('revolution.slide.onchange', function(e, data) {

            // slider changed
            var currentSlideNumber = data.slideIndex;
            console.log(currentSlideNumber);
        });

        // additional methods and data from the slider's API
        jQuery('.some-element-class-name').on('click', function() {

            // pause slider
            revapi.revpause();

            // resume slider
            revapi.revresume();

            // go to previous slide
            revapi.revprev();

            // go to next slide
            revapi.revnext();

            // go to specific slide
            revapi.revshowslide(2);

            // get total number of slides
            revapi.revmaxslide();

        });
        // added


        var slider = jQuery('.rev_slider_wrapper');
        if(!slider.length) return;

        // text to be used for the tabs, edit as needed

        var tabContainer = jQuery('<div class="my-slider-tabs" />').appendTo(slider),
            slides = slider.find('li'),
            len = slides.length,
            wid = Math.max(100 / len) + '%',
            tabs = [];

        slides.each(function(i) {
            var tabText = $(this).data('title')
            var span = tabs[i] = jQuery('<span />').css('width', wid).text(tabText).on('click', tabClick).appendTo(tabContainer);
            if(i === 0) span.addClass('tab-active');

        });


        function tabClick() {

            for(var i = 0; i < len; i++) {

                var tab = tabs[i];

                if(tab[0] !== this) {

                    tab.removeClass('tab-active');

                }
                else {

                    tab.addClass('tab-active');

                    // edit the "revapi12" part to match your slider's individual "API" variable
                    // information about how to get your slider's "API variable" can be found here:
                    // http://www.themepunch.com/home/plugins/wordpress-plugins/revolution-slider-wordpress/api-tutorial/
                    revapi1.revshowslide(i + 1);

                }
            }
        }

    });
})(jQuery);
