
$viewport = $(window).innerWidth();

console.log('The viewport width is: ' + $viewport );

var desktopNavigation = function(viewport){

  if ( viewport > 688 ){

    // on click of nav item
    $('#menu-primary > .menu-item-has-children > a, #menu-primary-1 > .menu-item-has-children > a').on('click', function(e){
      // set up variables and this
      $this           = $(this);
      $dropdown       = $this.parent().find('> .sub-menu'); // this item's submenu
      $allDropdowns   = $('header .sub-menu');
      $submenu        = $(this).parent().find('> .sub-menu .sub-menu');
      $submenuHeader  = $(this).parent().find('> .sub-menu .menu-item-has-children > a');

      // Stop Top level links from firing
      e.preventDefault();

      // Toggle active classes for parents
      $('.parent-active').removeClass('parent-active');
      $this.toggleClass('parent-active');

      // if the user clicks on the already open parent
      if( $dropdown.hasClass('dropdown-open') ){

        $dropdown.slideUp(300, function(){
          $dropdown.removeClass('dropdown-open');
        });

      } else if ( $allDropdowns.hasClass('dropdown-open') ) { // if a menu is open and a user clicks on a different one

        $allDropdowns.slideUp(300, function(){
          $allDropdowns.removeClass('dropdown-open');
          // $dropdown.slideDown(300);
          // $dropdown.addClass('dropdown-open');
        });

        setTimeout(function(){
          $dropdown.slideDown(300);
          $dropdown.addClass('dropdown-open');
        }, 302);

      } else{
        // if nothing is open
        $dropdown.slideDown(300, function(){
          $dropdown.addClass('dropdown-open');
        });

      }

      // Sub Menu Toggling
      $submenuHeader.on('click', function(event){
        // prevent links firing
        event.preventDefault();

        $submenu.slideDown(300);

      });

    });

    // click outside the dropdown to close
    $(document).click(function(event){
      if(!$(event.target).closest('.menu-item-has-children').length) {
        $('.parent-active').removeClass('parent-active');
        $('.sub-menu').slideUp(250).removeClass('dropdown-open');
        $('.parent-active').removeClass('parent-active');
        $('.sub-menu-open').removeClass('sub-menu-open');
      }
    });

  }


};

jQuery( document ).ready(function( $ ) {

  // Touch Device Detection
	var isTouchDevice = 'ontouchstart' in document.documentElement;
	if( isTouchDevice ) {
		$('body').removeClass('no-touch');
	}

  // Fire Nifty Nav
  niftyNav({
    subMenus: true,
    panelPosition: 'fixed'
  });

  // hook into nifty nav and lock body when opened
  $('#nifty-nav-toggle').on('click', function(){
    $('body').toggleClass('nifty-locked');
  });

  // fire desktop navigation
  desktopNavigation($viewport);

  // Slick Slider for Testimonials
  $('.testimonials--slider').slick({
    dots: false,
    arrows: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false
  });

  // Slick Slider for Partners
  $('.partners-slider').slick({
    dots: false,
    arrows: true,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    responsive: [
    {
      breakpoint: 688,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: false,
        arrows: false
      }
    }
  ]
  });


  if( $viewport > 688 ) {
    // Header Switching with Waypoints
    var waypoint = new Waypoint({
      element: document.getElementById('home-hero'),
      handler: function(direction) {
        if( direction === 'down' ){

         $('#home-navigation--top, #home-navigation--bottom').fadeOut(200);

         $('header').animate({
           height: '100px'
         }, 200, function(){
           $('#global-nav').fadeIn(200);
         });

        } else if ( direction === 'up' ) {

          $('#global-nav').fadeOut(200);

          $('#home-navigation--top, #home-navigation--bottom').fadeIn(200);

          $('header').animate({
            height: '198px'
          }, 200);

        }
      }
    });
  }


});
