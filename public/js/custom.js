jQuery.noConflict();

jQuery(document).ready(function(){

    "use strict";

    // countdow for product event
    if( jQuery('.tzCountdown').length > 0 ){
        var austDay = new Date();
        austDay = new Date(2015, 7 - 1, 26);
        jQuery('#defaultCountdown').countdown({until: austDay});
    }

    // partners
    if(jQuery(".tz-partners").length > 0){
        jQuery(".tz-partners").owlCarousel({
            items : 6,
            itemsDesktop : [1199,6],
            itemsDesktopSmall : [979,4],
            itemsTablet: [768, 3],
            itemsMobile: [479, 1],
            slideSpeed:500,
            paginationSpeed:800,
            rewindSpeed:1000,
            autoPlay:false,
            stopOnHover: false,
            singleItem:false,
            rewindNav:false,
            pagination:false,
            paginationNumbers:false,
            itemsScaleUp:false
        });
    }

    // Single product galley
    if( jQuery('.single-gallery').length > 0 ){
        jQuery(".single-gallery").owlCarousel({
            items : 1,
            itemsDesktop : [1199,1],
            itemsDesktopSmall : [979,1],
            itemsTablet: [768, 1],
            itemsMobile: [479, 1],
            slideSpeed:500,
            paginationSpeed:800,
            rewindSpeed:1000,
            autoPlay:false,
            stopOnHover: false,
            singleItem:false,
            rewindNav:false,
            pagination:true,
            paginationNumbers:false,
            itemsScaleUp:false
        });
    }

    //shop
    jQuery('.nav-list-view').click(function(){
        jQuery(this).addClass('active');
        jQuery('.nav-grid-view').removeClass('active');
       jQuery('.tz-product').addClass('list-view');
        jQuery('.tz-product').removeClass('grid-eff');
    });
    jQuery('.nav-grid-view').click(function(){
        jQuery(this).addClass('active');
        jQuery('.nav-list-view').removeClass('active');
       jQuery('.tz-product').removeClass('list-view');
        jQuery('.tz-product').addClass('grid-eff');
    });

});


jQuery(window).load(function() {





});
jQuery(window).bind('load resize',function(){

    "use strict";
    /* Method for parallax */
    jQuery('.parallax').each(function () {
        jQuery(this).parallax("30%", 0.1);
    });

    // set height for sidebar blog
    if( jQuery(this).width() > 991 ){
    if( jQuery('.tz-blog-content').length > 0 ){
        var $_heightBlog    = jQuery('.tz-blog-content').height();
        var $_heightSidebar = jQuery('.blog-sidebar').height();
        if( $_heightBlog > $_heightSidebar ){
            jQuery('.blog-sidebar').css('height', ($_heightBlog-30)+'px');
        }
    }
    }else{
        jQuery('.blog-sidebar').css('height','auto');
    }
});