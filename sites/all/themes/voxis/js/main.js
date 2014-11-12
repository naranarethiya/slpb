var Voxis = {
    slideCounter : 0,
    init : function() {
	
        jQuery("a[rel^='prettyPhoto']").prettyPhoto({
        });

        jQuery(".main-nav nav > ul").tinyNav({
            active: 'active',
            header: 'Navigation'
        });
        jQuery('.l_tinynav1').addClass('hidden-phone');
        jQuery('#tinynav1').addClass('visible-phone');
        jQuery('#js-news').ticker({
            titleText: '',
        });

        if(jQuery('nav > ul.l_tinynav1 > li').length < 9)
            jQuery('header .main-nav nav > ul > li:last-child .inner a').css("border-right", "solid 1px #d3d2d2");

        Voxis.slidersInit();
        //Voxis.resizeFeaturedVideo();
       //Voxis.articleShowcase();
        //Voxis.commentsBorder();
        Voxis.resizeContentHeight();
        //Voxis.toggleBox();
        jQuery(window).scroll(function() {
            Voxis.hideScrollToTop();
        });
        jQuery('.back-to-top').click(Voxis.scrollTop);

        //jQuery('aside .photo-list .photo a').tooltip();
    },
    slidersInit : function() {
        jQuery('#entertainment-slider').flexslider({
            'controlNav': true,
            'directionNav' : false,
            "touch": true,
            "animation": "slide",
            "animationLoop": true,
            "slideshow" : false
        });

        jQuery('#business-slider').flexslider({
            'controlNav': true,
            'directionNav' : false,
            "touch": true,
            "animation": "slide",
            "animationLoop": true,
            "slideshow" : false
        });

        jQuery('#slider').flexslider({
            'controlNav': false,
            'directionNav' : false,
            "touch": true,
            "animation": "fade",
            "animationLoop": true,
            "slideshow" : false
        });

        jQuery('.slide-box .slider').flexslider({
            'controlNav': false,
            'directionNav' : true,
            "touch": true,
            "animation": "slide",
            "animationLoop": true,
            "slideshow" : false
        })

        jQuery('.slider-navigation .navigation-item').click(function() {
            var link = jQuery(this).attr('rel');
            link = parseInt(link);
            jQuery('.slider-navigation .navigation-item.active').removeClass('active');
            jQuery(this).addClass('active');
            jQuery('#slider').flexslider((link-1));
            clearInterval(intervalID);
            intervalID = setInterval( Voxis.moveSliders, 5000 );
        });

        var intervalID = setInterval( Voxis.moveSliders, 5000 );
    },
    moveSliders : function() {
        var max = jQuery('.slider-navigation .navigation-item').length;
        Voxis.slideCounter++;
        if (Voxis.slideCounter < max) {
            jQuery('.slider-navigation .navigation-item.active').next().click();
        } else {
            Voxis.slideCounter = 0;
            jQuery('.slider-navigation .navigation-item:first-child').click();
        }
    },
    resizeFeaturedVideo : function() {
        var divW = jQuery('aside .featured-video').width();
        var videoH = 0.5625 * divW;
        jQuery('aside .featured-video iframe').attr('width', divW);
        jQuery('aside .featured-video iframe').attr('height', videoH);
    },
    articleShowcase : function() {
        jQuery('.article-showcase article').on('click', function() {
            jQuery('.article-showcase article.active').removeClass('active');
            jQuery(this).addClass('active');
            var link = jQuery(this).attr('rel');
            jQuery('.article-showcase .big-article.active').removeClass('active').fadeOut('slow', function() {
                jQuery('.article-showcase .big-article[rel="'+link+'"]').fadeIn('slow');
                jQuery('.article-showcase .big-article[rel="'+link+'"]').addClass('active');
            });
        });
    },
    commentsBorder : function() {
        jQuery('.top-comment').each(function() {
            var commentH = jQuery(this).height();
            var figureH = jQuery(this).find('figure').first().height();
            console.log(figureH);
            jQuery(this).find('.border').height((commentH-(1.9 * figureH)));
//            var positionTop = jQuery(this).children().last().position().top;
//            console.log(positionTop);
        });
    },
    resizeContentHeight : function() {
        var windowH = jQuery(window).height();
        var headerH = jQuery('header').height();
        var sliderH = jQuery('.slider').height();
        var footerH = jQuery('footer').height();
        var sub_footerH = jQuery('.sub-footer').height();

        var contentH = windowH - headerH - sliderH - footerH - sub_footerH - 19;

        jQuery('#main > .container').css({
            "min-height" : contentH
        });
    },
    toggleBox : function() {
        jQuery('.toggle-box .close-box').on('click', function() {
           var box = jQuery(this).parent().parent().parent();
            if(box.hasClass('open')) {
                box.find('.content-toggle').slideUp("fast", function() {
                    box.removeClass('open').addClass('closed');
                });
            }
            if(box.hasClass('closed')) {
                box.find('.content-toggle').slideDown("fast", function() {
                    box.removeClass('closed').addClass('open');
                });
            }
        });
    },
    scrollTop : function() {
        jQuery('body, html').animate({
            scrollTop:  "0px"
        }, 500);
        return false;
    },
    hideScrollToTop : function() {
        var windowH = jQuery(window).height();
        var scrollH = jQuery(window).scrollTop() + windowH - 100;
        if( windowH < scrollH ) {
            jQuery('.back-to-top').fadeIn('slow');
        } else {
            jQuery('.back-to-top').fadeOut('slow');
        }
    }
}

var slide_click=1;
jQuery(document).ready(function() {
   Voxis.init();
   setInterval(function () {
        jQuery('ol li:nth-child('+slide_click+') a').trigger('click');
        slide_click++;

        if(slide_click > 5) {
            slide_click=1;
        }
    },5000);
});

jQuery(window).resize(function() {
    Voxis.resizeFeaturedVideo();
    Voxis.commentsBorder();
    Voxis.resizeContentHeight();
});

jQuery(document).ready(function() {
	jQuery('table').addClass('table table-bordered');
	mapload();
	
});

function mapload() {
	map = new google.maps.Map(document.getElementById("map"), {
		 center: new google.maps.LatLng(18.933236,72.833328),
        zoom: 5,
        mapTypeId: 'roadmap',
      });
	  set_markers();
}

function set_markers() {
	var contant1="શ્રી લેવા પાટીદાર બોર્ડિંગ,ભચાઉ—કચ્છ</div>";
	var contant2="મુંબઇ કાર્યાલય, શ્રી લેવા પાટીદાર બોર્ડિંગ";
	var lat1=23.293945;
	var lat2=18.933236;
	var lng1=70.330392;
	var lng2=72.833328;
	
	var marker = new google.maps.Marker({
		map: map,
		position: new google.maps.LatLng(lat1,lng1)
	});
	var infoWindow = new google.maps.InfoWindow;
	bindInfoWindow(marker, map, infoWindow, contant1);
	
	marker = new google.maps.Marker({
		map: map,
		position: new google.maps.LatLng(lat2,lng2)
	});
	bindInfoWindow(marker, map, infoWindow, contant2);
}

function bindInfoWindow(marker, map, infoWindow, html) {
  google.maps.event.addListener(marker, 'click', function() {
	infoWindow.setContent(html);
	infoWindow.open(map, marker);
  });
}
