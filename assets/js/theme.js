
// Get Viewport Width
$viewport = $(window).innerWidth();

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

// Staff Grid REST API
var staffgrid = function(){

  var domain = document.domain;

  var  replaceContent = function(){

  };

  $.ajax({
    dataType: 'json',
    url: '/wp-json/wp/v2/f1_staffgrid_cpt?_embed',
    success: function(data){

      $.each(data, function(i,v){

        var staff_post   = data[i],
            post_title   = staff_post.title.rendered,
            job_title    = staff_post.acf.title,
            staff_bio    = staff_post.acf.staff_bio;

            // Get Thumbnail thats cropped, if it doesn't exist fall back to full size as a last resort
            if( staff_post._embedded['wp:featuredmedia'][0].media_details.sizes['profile-image'] ){
              featured_img = staff_post._embedded['wp:featuredmedia'][0].media_details.sizes['profile-image'].source_url;
            } else {
              featured_img = staff_post._embedded['wp:featuredmedia'][0].media_details.sizes.full.source_url;
            }

        if ( post_title === 'Anthony Narducci' ){
          $('#staff-name').html(post_title);
          $('#staff-image-featured').attr('style', 'background: url('+featured_img+') center center no-repeat;');
          $('#staff-title').html(job_title);
          $('#staff-bio').html(staff_bio);
        }

      });

    }
  });

};

jQuery( document ).ready(function( $ ) {

  // Touch Device Detection
	var isTouchDevice = 'ontouchstart' in document.documentElement;
	if( isTouchDevice ) {
		$('body').removeClass('no-touch');
	}

  staffgrid();

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


  if( $viewport > 688 && $('body').hasClass('home') ) {
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

  // Share Button
  config = {
    ui: {
      flyout: 'middle left'
    }
  };
  new ShareButton(config);

});
