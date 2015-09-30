(function ($) {

    // all Javascript code goes here


    // -->

    jQuery(document).ready(function () {

        var currentslider = "#" + $("div [id^=rev_slider]:not([id$=wrapper])").attr('id');
        var revapi1 = jQuery(currentslider);


        revapi1.bind("revolution.slide.onchange", function (e, data) {
            //var debug = jQuery.type( data );
            // console.log(e);
            // console.log(data);
            // console.log(debug);
            //console.log("slide changed to: "+data.slideIndex);
            //console.log("current slide <li> Index: "+data.slideLIIndex);
            var slideIndex = data.slideLIIndex;
            console.log(slideIndex);
            //data.currentslide - Current  Slide as jQuery Object
            //data.prevslide - Previous Slide as jQuery Object
            $(".my-slider-tabs span:eq(" + slideIndex + ")").addClass('tab-active');
            $(".my-slider-tabs span:not(span:eq(" + slideIndex + "))").removeClass('tab-active');


        });


        var slider = jQuery('.rev_slider_wrapper');
        if (!slider.length) {
            return;
        }

        var tabContainer = jQuery('<div class="my-slider-tabs" />').appendTo(slider),
            slides = slider.find('li'),
            len = slides.length,
            wid = Math.max(100 / len) + '%',
            tabs = [];

        tabContainer.wrap('<div class="slider-tab-wrapper" />');

        slides.each(function (i) {
            var tabText = $(this).data('title');
            var span = tabs[i] = jQuery('<span />').addClass("theTab").css('width', wid).text(tabText).on('click', tabClick).appendTo(tabContainer);
            if (i === 0) {
                span.addClass('tab-active');
            }

        });


        function tabClick() {
            for (var i = 0; i < len; i++) {

                var tab = tabs[i];

                if (tab[0] !== this) {

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
