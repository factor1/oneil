
var desktopNavigation = function(){
  // on click of nav item
  $('#menu-primary > .menu-item-has-children > a').on('click', function(e){
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
        $dropdown.slideDown(300);
        $dropdown.addClass('dropdown-open');
      });

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

};

jQuery( document ).ready(function( $ ) {

  // Touch Device Detection
	var isTouchDevice = 'ontouchstart' in document.documentElement;
	if( isTouchDevice ) {
		$('body').removeClass('no-touch');
	}

  // Fire Nifty Nav
  niftyNav({
    subMenus: true
  });

  // hook into nifty nav and lock body when opened
  $('#nifty-nav-toggle').on('click', function(){
    $('body').toggleClass('nifty-locked');
  });

  // fire desktop navigation
  desktopNavigation();

});
