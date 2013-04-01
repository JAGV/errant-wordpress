
	jQuery(document).ready(function($) {

		// Your JavaScript goes here

        $("a.myfancybox").fancybox({
            openEffect: 'fade',
            nextEffect: 'fade',
            prevEffect: 'fade',

            zoomSpeedIn: 500,
            zoomSpeedOut: 500,
            overlayShow: true,
            overlayOpacity: 0.3,

            helpers : {
                    thumbs : {
                        width : 50,
                        height: 35
                    }
            }
        }); // close fancybox

        $(".article__body").fitVids();

	}); // close jQuery