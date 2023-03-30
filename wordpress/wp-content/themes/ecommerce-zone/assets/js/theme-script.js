function ecommerce_zone_openNav() {
  window.ecommerce_zone_RespoMenu=true;
  jQuery(".sidenav").addClass('show');
}
function ecommerce_zone_closeNav() {
  window.ecommerce_zone_RespoMenu=false;
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function ecommerce_zone_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const ecommerce_zone_nav = document.querySelector( '.sidenav' );

      if ( ! ecommerce_zone_nav || ! ecommerce_zone_nav.classList.contains( 'show' ) ) {
        return;
      }

      const elements = [...ecommerce_zone_nav.querySelectorAll( 'input, a, button' )],
        ecommerce_zone_lastEl = elements[ elements.length - 1 ],
        ecommerce_zone_firstEl = elements[0],
        ecommerce_zone_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && ecommerce_zone_lastEl === ecommerce_zone_activeEl ) {
        e.preventDefault();
        ecommerce_zone_firstEl.focus();
      }

      if ( shiftKey && tabKey && ecommerce_zone_firstEl === ecommerce_zone_activeEl ) {
        e.preventDefault();
        ecommerce_zone_lastEl.focus();
      }
    } );
  }

  ecommerce_zone_keepFocusInMenu();
} )( window, document );

jQuery(document).ready(function() {
	var owl = jQuery('#top-slider .owl-carousel');
		owl.owlCarousel({
			margin: 25,
			nav: true,
			autoplay:true,
			autoplayTimeout:2000,
			autoplayHoverPause:true,
			loop: true,
      rtl: true,
			navText : ['<i class="fa fa-lg fa-chevron-left" aria-hidden="true"></i>','<i class="fa fa-lg fa-chevron-right" aria-hidden="true"></i>'],
			responsive: {
			  0: {
			    items: 1
			  },
			  600: {
			    items: 1
			  },
			  1024: {
			    items: 1
			}
		}
	})
    window.addEventListener('load', (event) => {
    jQuery(".loading").delay(2000).fadeOut("slow");
  });
})

var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.head-menu').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.head-menu').addClass("stick_header");
    } else {
      jQuery('.head-menu').removeClass("stick_header");
    }
  }
});
