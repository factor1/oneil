
var desktopNavigation = function(){
  // on click of nav item
  $('.menu-item-has-children > a').on('click', function(e){
    e.preventDefault();

    $(this).toggleClass('parent-active');

    // establish "this" and other variables
    $this = $(this).parent();
    $dropdown = $this.find('> ul');

    // slide down main dropdown
    $dropdown.slideToggle(250);

  });

  // click outside the dropdown to close
  $(document).click(function(event){
    if(!$(event.target).closest('.menu-item-has-children').length) {
      $('.sub-menu').slideUp(250);
      $('.parent-active').removeClass('parent-active');
    }
  });

};

jQuery( document ).ready(function( $ ) {
  // Inside of this function, $() will work as an alias for jQuery()
  // and other libraries also using $ will not be accessible under this shortcut
  // https://codex.wordpress.org/Function_Reference/wp_enqueue_script#jQuery_noConflict_Wrappers

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
