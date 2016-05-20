jQuery(document).ready(function() {

    if(jQuery('#rev_slider_1_1').revolution == undefined){
        revslider_showDoubleJqueryError('#rev_slider_1_1');
    }else{
        revapi1 = jQuery('#rev_slider_1_1').show().revolution(
            {
                dottedOverlay:"none",
                delay:7000,
                startwidth:1170,
                startheight:600,
                hideThumbs:200,

                thumbWidth:100,
                thumbHeight:50,
                thumbAmount:3,


                simplifyAll:"off",

                navigationType:"none",
                navigationArrows:"solo",
                navigationStyle:"round",

                touchenabled:"on",
                onHoverStop:"on",
                nextSlideOnWindowFocus:"off",

                swipe_threshold: 75,
                swipe_min_touches: 1,
                drag_block_vertical: false,



                keyboardNavigation:"off",

                navigationHAlign:"center",
                navigationVAlign:"bottom",
                navigationHOffset:0,
                navigationVOffset:20,

                soloArrowLeftHalign:"left",
                soloArrowLeftValign:"center",
                soloArrowLeftHOffset:20,
                soloArrowLeftVOffset:0,

                soloArrowRightHalign:"right",
                soloArrowRightValign:"center",
                soloArrowRightHOffset:20,
                soloArrowRightVOffset:0,

                shadow:0,
                fullWidth:"on",
                fullScreen:"off",

                spinner:"spinner0",

                stopLoop:"off",
                stopAfterLoops:-1,
                stopAtSlide:-1,

                shuffle:"off",

                autoHeight:"off",
                forceFullWidth:"off",



                hideThumbsOnMobile:"off",
                hideNavDelayOnMobile:1500,
                hideBulletsOnMobile:"off",
                hideArrowsOnMobile:"off",
                hideThumbsUnderResolution:0,

                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                startWithSlide:0
            });
    }
});	/*ready*/