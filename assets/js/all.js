
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

/* Nifty Nav
* Author: Eric Stout / Factor1
* http://factor1studios.com
* Repo: https://github.com/factor1/nifty-nav
* Version: 2.2.0
*/

var niftyNav = function(options){
  $nifty_toggle = $('#nifty-nav-toggle');
  $nifty_panel = $('.nifty-panel');
  $nifty_nav_item = $('.nifty-nav-item');
  $nifty_parent = $('.nifty-panel ul li');

  var settings = $.extend({
    // These are the defaults.
    subMenus: false,
    mask: true,
    itemClickClose: true,
    panelPosition:  'absolute',
    subMenuParentLink:  false
  }, options );

  subMenus          = settings.subMenus;
  mask              = settings.mask;
  itemClickClose    = settings.itemClickClose;
  panelPosition     = settings.panelPosition;
  subMenuParentLink = settings.subMenuParentLink;


  // Core Nifty Nav Functions
  niftyRemove = function(){
    $('.nifty-mask').remove();
  };

  niftyUnmask = function(){
    $('.nifty-mask').animate({opacity: 0.0});
    setTimeout(niftyRemove, 800);
  };

  // on nifty nav toggle click
  $nifty_toggle.click(function(){
    var $this = $(this);
    $this.toggleClass('nifty-active');
    $nifty_panel.slideToggle(500).css('position',panelPosition);

    // if panelPosition is fixed
    if( panelPosition == 'fixed' ){
      $('body').toggleClass('nifty-lock');
    }

    if( mask === true){
      // if a mask exists
      if( $('.nifty-mask').length > 0 ){
        niftyUnmask();
      } else{
        // if no mask exists
        $('body').append('<div class="nifty-mask"></div>');
        $('.nifty-mask').animate({opacity: 1.0});

        // if a user clicks on the mask
        $('.nifty-mask').click(function(){
          $nifty_panel.slideUp(500);
          niftyUnmask();
          $nifty_toggle.removeClass('nifty-active');

          // if panelPosition is fixed
          if( panelPosition == 'fixed' ){
            $('body').removeClass('nifty-lock');
          }
        });
      }
    }
  });

  // close nifty nav on nav item click
  if( itemClickClose === true ){
    $nifty_nav_item.click(function(){
      $nifty_panel.slideUp(500);
      niftyUnmask();
      $nifty_toggle.removeClass('nifty-active');

      // if panelPosition is fixed
      if( panelPosition == 'fixed' ){
        $('body').removeClass('nifty-lock');
      }

    });
  }

  // if sub menus are enabled
  if( subMenus === true ){
    var $nifty_parent_active;
    // if subMenuParentLink is false
    if( subMenuParentLink === false ){
      $('.nifty-panel .menu-item-has-children > a').click(function(event){
        event.preventDefault();
      });
    }

    $nifty_parent.click(function(){
      $nifty_parent_active = $(this);
      $nifty_parent_active.find('.sub-menu').slideToggle();
      $nifty_parent_active.find('a').toggleClass('nifty-menu-opened');
    });
  }

};
