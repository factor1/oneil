var stagingURL = 'https://oneilprint.com';

// Get Viewport Width
$viewport = $(window).innerWidth();

// Body Locking

var $docEl = $('html, body'),
    $wrap = $('main'),
    scrollTop;

$.lockBody = function () {
    if (window.pageYOffset) {
        scrollTop = window.pageYOffset;

        $wrap.css({
            top: -(scrollTop)
        });
    }

    $docEl.css({
        height: "100%",
        overflow: "hidden"
    });
};

$.unlockBody = function () {
    $docEl.css({
        height: "",
        overflow: ""
    });

    $wrap.css({
        top: ''
    });

    window.scrollTo(0, scrollTop);
    window.setTimeout(function () {
        scrollTop = null;
    }, 0);

};

var desktopNavigation = function (viewport) {

    if (viewport > 860) {

        $('.menu > li > a').on('click', function (e) {
            var $this = $(this),
                $dropdown = $this.parent().find('> .sub-menu');
            //$submenu  = $dropdown.find('.menu-item-has-children > a');

            if ($this.parent().hasClass('menu-item-has-children')) {
                e.preventDefault();

                // if user clicks on an item already open
                if ($this.hasClass('parent-active')) {
                    console.log('Active parent');
                    $dropdown.slideUp(300);
                    $this.removeClass('parent-active');

                    // if user clicks on another item while other dropdown is open
                } else if ($('.menu li .parent-active')) {
                    $('.parent-active').parent().find('> .sub-menu').slideUp(300);
                    $('.parent-active').removeClass('parent-active');
                    $dropdown.slideToggle(300);
                    $this.toggleClass('parent-active');

                    // no dropdowns open
                } else {
                    $this.toggleClass('parent-active');
                    $dropdown.slideToggle(300);

                }
            }

        });

        // sub menu toggles
        $('.menu > li > .sub-menu > li.menu-item-has-children > a').on('click', function (event) {
            event.preventDefault();
            $_this = $(this);
            $_this.toggleClass('parent-active');
            $_this.parent().find('.sub-menu').slideToggle(300);
        });

        // click outside the dropdown to close
        $(document).click(function (event) {
            if (!$(event.target).closest('.menu-item-has-children').length) {
                $('.parent-active').removeClass('parent-active');
                $('.sub-menu').slideUp(300).removeClass('dropdown-open');
            }
        });

    }


};

// Staff Grid REST API
var staffgrid = function () {

    $.ajax({
        dataType: 'json',
        url: stagingURL + '/wp-json/wp/v2/f1_staffgrid_cpt?_embed&filter[orderby]=menu_order&order=asc',
        success: function (data) {

            var staffImages = [];

            $('.staff-loader').remove();

            $.each(data, function (i, v) {

                var staff_post = data[i],
                    id = staff_post.id,
                    post_title = staff_post.title.rendered,
                    job_title = staff_post.acf.title,
                    staff_bio = staff_post.acf.staff_bio;


                // Get Thumbnail thats cropped, if it doesn't exist fall back to full size as a last resort
                if (staff_post._embedded && staff_post._embedded['wp:featuredmedia'][0].media_details.sizes['profile-image']) {
                    featured_img = staff_post._embedded['wp:featuredmedia'][0].media_details.sizes['profile-image'].source_url;
                } else if (staff_post._embedded) {
                    featured_img = staff_post._embedded['wp:featuredmedia'][0].media_details.sizes.full.source_url;
                } else {
                    featured_img = '';
                }

                staffImages.push({
                    id: id,
                    image: featured_img
                });


                // Set Default Featured Staff
                if (post_title === 'Anthony Narducci') {
                    $('#staff-name').html(post_title);
                    $('#staff-image-featured').attr('style', 'background: url(' + featured_img + ') center center no-repeat;');
                    $('#staff-title').html(job_title);
                    $('#staff-bio').html(staff_bio);
                }

                // Append staff items to the grid
                $('#staff-block-grid').append('<div id="' + id + '" class="col"><div class="small-staff-profile-img" title="' + post_title + '" style="background: url(' + featured_img + ') center center no-repeat;"></div></div>');

                // Setup clicks for when a user selects a staff member
                $('#' + id).on('click', function () {

                    $('html, body').animate({
                        scrollTop: $('.staff-grid').offset().top - 100
                    }, 500);

                    if (window.innerWidth > 767) {

                        $('#staff-name').html(post_title);
                        $('#staff-image-featured').attr('style', 'background: url(' + staffImages[i].image + ') center center no-repeat;');
                        $('#staff-title').html(job_title);
                        $('#staff-bio').html(staff_bio);

                    } else {

                        $('body').addClass('modal-open');
                        $.lockBody();
                        $('#staff-modal').append('<div class="close-modal"></div><div class="mobile-staff-container"><div class="mobile-staff-img" style="background: url(' + staffImages[i].image + ') center center no-repeat;"></div><div class="staff-mobile-name"><h2>' + post_title + '</h2></div><div class="mobile-staff-title"><h5>' + job_title + '</h5></div><div class="mobile-staff-bio">' + staff_bio + '</div></div>');

                        $('.close-modal').on('click', function () {
                            $('body').removeClass('modal-open');
                            $.unlockBody();
                            $('#staff-modal').empty();
                        });

                    }
                });

            });
        }
    });

};

// Work Examples Slider & Ajax pull
var workSamples = function () {

    if ($('body').hasClass('page-id-6')) {
        work_ID = '6';
    } else if ($('body').hasClass('page-id-430')) {
        work_ID = '430';
    }

    $.ajax({
        dataType: 'json',
        url: stagingURL + '/wp-json/wp/v2/pages/' + work_ID,
        success: function (data) {

            $('.staff-loader').remove();

            var slides = data.acf.work_samples_slider;

            $.each(slides, function (i, v) {

                // get data from object
                var image = slides[i].image.sizes.large,
                    thumb = slides[i].image.sizes.thumbnail,
                    url = slides[i].url;

                if (url === '') {
                    url = '#work-samples-slider';
                }

                $('#work-samples-slider').append('<div class="work-slide"><a href="' + url + '"><img src="' + image + '" alt="" role="presentation"></a></div>');
                $('#work-samples-nav').append('<div class="work-nav-slide"><img src="' + thumb + '" alt="" role="presentation"></div>');

            });

            $('#work-samples-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                fade: false,
                asNavFor: '#work-samples-nav',
                adaptiveHeight: false
            });
            $('#work-samples-nav').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '#work-samples-slider',
                dots: false,
                centerMode: false,
                focusOnSelect: true,
                arrows: false
            });

        }
    });

};

// News and Posts
var getPosts = function (page) {


    $.ajax({
        dataType: 'json',
        url: stagingURL + '/wp-json/wp/v2/posts/?_embed&page=' + page + '&per_page=15',
        success: function (data) {

            // if the results return no posts
            if (data.length < 1) {
                $('#load-more').remove();
            } else {

                $.each(data, function (i, v) {

                    var post = data[i],
                        title = post.title.rendered,
                        excerpt = post.excerpt.rendered,
                        permalink = post.link,
                        category = post._embedded['wp:term'][0][0].slug;

                    // setup card component
                    var postcard = '<div class="col ' + category + '"><a href="' + permalink + '"><h4>' + title + '</h4><img src="' + stagingURL + '/wp-content/themes/oneil/assets/img/line-black.svg" alt="" role="presentation" class="slant">' + excerpt + '</a></div>';

                    // if has post thumbnail
                    if (post.featured_media !== 0) {

                        if (post._embedded['wp:featuredmedia'][0].code) { // if the post thumbnail has a 403 error

                            $('.news-posts .posts-container').append(postcard);
                            console.log('[Rest API]: Thumbnail for post ' + post.id + ' belongs to custom post type and cannot be accessed from standard posts.');

                        } else { // if the post thumbnail is successful

                            thumbnail = post._embedded['wp:featuredmedia'][0].media_details.sizes['profile-image'].source_url;
                            postcard = '<div class="col ' + category + '"><a href="' + permalink + '" class="post-featured-img" style="background: url(' + thumbnail + ') center center no-repeat;"></a><a href="' + permalink + '"><h4>' + title + '</h4><img src="' + stagingURL + '/wp-content/themes/oneil/assets/img/line-black.svg" alt="" role="presentation" class="slant">' + excerpt + '</a></div>';
                            $('.news-posts .posts-container').append(postcard);

                        }

                    } else {
                        // if has no post thumbnail
                        $('.news-posts .posts-container').append(postcard);
                    }

                });

                // Add Load More Button
                var nextPage = page + 1;

                if ($('#load-more').length === 0) {
                    $('.news-posts .load-more-container').append('<a id="load-more" href="#" class="button button--white" onclick="getPosts(' + nextPage + ')">View More</a>');
                } else {
                    $('#load-more').attr('onclick', 'getPosts(' + nextPage + ')');
                }

            }

            // remove loader
            $('.staff-loader').remove();

            // prevent default on load more buttons
            $('#load-more').on('click', function (e) {
                e.preventDefault();
            });

            // Recalc Macy
            Macy.recalculate();

        }
    });

};

var getCategories = function () {
    $.ajax({
        dataType: 'json',
        url: stagingURL + '/wp-json/wp/v2/categories',
        success: function (data) {
            $.each(data, function (i, v) {
                var id = data[i].id,
                    name = data[i].name;

                if (name !== 'Uncategorized') {
                    $('#post-categories').append('<li><a id="cat-' + id + '" href="#">' + name + '</a></li>');

                    // On Click Load Those Posts
                    $('#cat-' + id).on('click', function (e) {

                        e.preventDefault();

                        $.ajax({
                            dataType: 'json',
                            url: stagingURL + '/wp-json/wp/v2/posts?_embed&categories=' + id,
                            success: function (posts) {

                                // clear current posts
                                $('.news-posts .posts-container').empty();
                                $('#load-more').remove();

                                // loop through each post
                                $.each(posts, function (i, v) {
                                    var post = posts[i],
                                        title = post.title.rendered,
                                        excerpt = post.excerpt.rendered,
                                        permalink = post.link,
                                        category = post._embedded['wp:term'][0][0].slug;

                                    // setup card component
                                    var postcard = '<div class="col ' + category + '"><a href="' + permalink + '"><h4>' + title + '</h4><img src="' + stagingURL + '/wp-content/themes/oneil/assets/img/line-black.svg" alt="" role="presentation" class="slant">' + excerpt + '</a></div>';

                                    // if has post thumbnail
                                    if (post.featured_media !== 0) {

                                        if (post._embedded['wp:featuredmedia'][0].code) { // if the post thumbnail has a 403 error

                                            $('.news-posts .posts-container').append(postcard);
                                            console.log('[Rest API]: Thumbnail for post ' + post.id + ' belongs to custom post type and cannot be accessed from standard posts.');

                                        } else { // if the post thumbnail is successful

                                            thumbnail = post._embedded['wp:featuredmedia'][0].media_details.sizes['profile-image'].source_url;
                                            postcard = '<div class="col ' + category + '"><a href="' + permalink + '" class="post-featured-img" style="background: url(' + thumbnail + ') center center no-repeat;"></a><a href="' + permalink + '"><h4>' + title + '</h4><img src="' + stagingURL + '/wp-content/themes/oneil/assets/img/line-black.svg" alt="" role="presentation" class="slant">' + excerpt + '</a></div>';
                                            $('.news-posts .posts-container').append(postcard);

                                        }

                                    } else {
                                        // if has no post thumbnail
                                        $('.news-posts .posts-container').append(postcard);
                                    }
                                });

                                // Recalc Macy
                                Macy.recalculate();

                            } // end success

                        }); // end ajax pull

                    }); // end on click

                } // end if

            }); // end loop of each category in dropdown

            // add clear post LI
            $('#post-categories').append('<li><a id="reset-posts" onclick="clearPosts()" href="#">Clear Filters</a></li>');

            // prevent default on clear
            $('#reset-posts').on('click', function (e) {
                e.preventDefault();
            });

        } //end success
    }); // end category ajax call
}; // end get cat function

// clear post filter function
var clearPosts = function () {
    $('.news-posts .posts-container').empty();
    $('.news-posts .posts-container').append('<div class="staff-loader"><img src="' + stagingURL + '/wp-content/themes/oneil/assets/img/loading.svg" alt="Loading..."></div>');
    getPosts(1);
};

// Blog index page get ACF intro content
var getIndexACF = function () {
    $.ajax({
        dataType: 'json',
        url: stagingURL + '/wp-json/wp/v2/pages/38',
        success: function (data) {

            var headline = data.acf.intro_content_headline,
                content = data.acf.intro_content;

            $('.part--intro-content .row .col-10 > h1').empty().html(headline);
            $('.part--intro-content .row .col-10').append(content);

        } //end success
    }); // end ajax call
}; // end getIndexACF

// Gallery Slider Ajax
var getGallerySlider = function () {
    $.ajax({
        dataType: 'json',
        url: stagingURL + '/wp-json/wp/v2/pages/229',
        success: function (data) {

            $('.staff-loader').remove();

            var slides = data.acf.gallery_items;

            $.each(slides, function (i, v) {

                var title = slides[i].title,
                    content = slides[i].content,
                    slide_id = 'slide-' + i,
                    image = slides[i].image;

                // Append to main Slider
                $('#gallery-top-slider').append('<div id="' + slide_id + '" class="gallery-slide"><div class="gallery-slide-image" style="background: url(' + image + ') center center no-repeat;"></div><div class="gallery-slide-content container"><div class="row"><div class="col-6"><h4>' + title + '</h4><img src="' + stagingURL + '/wp-content/themes/oneil/assets/img/line-black.svg" alt="" role="presentation" class="slant">' + content + '</div><div class="col-6 text-right slide-icon-container"></div></div></div></div>');

                // Append to Nav Slider
                $('#gallery-navigation').append('<div class="nav-slide"><div style="background: url(' + image + ') center center no-repeat;"></div></div>');

                // if we have icons in the icon repeater
                if (slides[i].icons !== false) {

                    $.each(slides[i].icons, function (index, value) {
                        $('#' + slide_id).find('.slide-icon-container').append('<img src="' + slides[i].icons[index].icon + '" alt="">');
                    });
                }

            });

            // fire sliders
            $('#gallery-top-slider').slick({
                dots: false,
                asNavFor: '#gallery-navigation',
                arrows: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                pauseOnHover: false
            });

            $('#gallery-navigation').slick({
                arrows: true,
                asNavFor: '#gallery-top-slider',
                slidesToShow: 4,
                autoplay: false,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 860,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 2,
                            infinite: true,
                            dots: true,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                            dots: true,
                            arrows: false
                        }
                    }
                ]
            });

        } //end success
    }); // end ajax call
}; // end getGallerySlider

jQuery(document).ready(function ($) {

    // Browser Detection
    var version = Math.floor(bowser.version);
    browser = bowser.name + '_' + version;
    $('body').addClass(browser);

    // if browser is iOS
    if (bowser.ios) {
        $('body').addClass('ios');
    }


    // Touch Device Detection
    var isTouchDevice = 'ontouchstart' in document.documentElement;
    if (isTouchDevice) {
        $('body').removeClass('no-touch');
    }

    // Fire Staff Grid Function and ajax pull
    if ($('body').hasClass('page-template-our-people')) {
        staffgrid();
    }

    // Fire Work Samples Slider
    if ($('body').hasClass('page-template-our-work')) {
        workSamples();
    }

    // Fire Gallery Sliders
    if ($('body').hasClass('page-template-gallery')) {
        getGallerySlider();
    }

    // Fire Nifty Nav
    // $('#nifty-nav-toggle').niftyNav({
    //   subMenus: true,
    //   panelPosition: 'fixed'
    // });

    niftyNav({
        subMenus: true,
        panelPosition: 'fixed'
    });


    // hook into nifty nav and lock body when opened
    $('#nifty-nav-toggle').on('click', function () {
        $('body').toggleClass('nifty-locked');
    });

    // fire desktop navigation
    desktopNavigation($viewport);

    // On Click Open Search Component
    $('.search-icon, #close-search, .search-icon-global').on('click', function (e) {
        e.preventDefault();
        $('#search-container').slideToggle(300);
    });

    // Slick Slider for Testimonials
    $('.testimonials--slider').slick({
        dots: true,
        arrows: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false
    });

    // Slick Slider for Partners
    $('.partners-slider, .past-work-slider').slick({
        dots: false,
        arrows: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        responsive: [
            {
                breakpoint: 860,
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

    // Featured Case Study Slider, Our Work Slider, Default Page Slider
    $('#featured-case-study-slider, .our-work--slider, #default-page-slider').slick({
        dots: false,
        arrows: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000
    });


    if ($viewport > 860 && $('body').hasClass('home')) {
        // Header Switching with Waypoints
        var waypoint = new Waypoint({
            element: document.getElementById('home-hero'),
            handler: function (direction) {
                if (direction === 'down') {

                    $('#home-navigation--top, #home-navigation--bottom').fadeOut(200);

                    $('header').animate({
                        height: '100px'
                    }, 200, function () {
                        $('#global-nav').fadeIn(200);
                    });

                } else if (direction === 'up') {

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

    // if we are on the blog view fire all our functions
    if ($('body').hasClass('blog')) {
        getIndexACF();

        getPosts(1);

        getCategories();

        // Category Drop Down on News Page
        $('.dropdown').on('click', function () {
            $(this).toggleClass('active');
            $('#post-categories').slideToggle();
        });

        $(document).click(function (event) {
            if (!$(event.target).closest('.dropdown').length) {
                $('.dropdown').removeClass('active');
                $('#post-categories').slideUp();
            }
        });

        // Fire Masonry
        Macy.init({
            container: '#masonry',
            trueOrder: false,
            margin: 20,
            columns: 3,
            breakAt: {
                890: 2,
                618: 1
            }
        });

    }


    $('.video-poster').click(function () {
        $('.video-modal').fadeIn();
    });

    $('.video-modal .close, .video-modal .overlay').click(function () {
        $('.video-modal').fadeOut();
    });

});

(function ($) {
    $.bgResponsiveImage = function (element, options) {
        // **************************************************************
        // Public Properties
        // **************************************************************

        var $c = $(element), // Context

            BgResponsiveImage = (function ($c, o) {
                var defaults = {
                    'parent': 'figure',

                    'activeClass': 'active',
                    'breakPoint': 768,

                    'speed': 500,
                    'easing': 'swing'
                };

                var _o = {},

                    $p = null, // Parent
                    src = {},

                    debounce = 0,
                    isMobile = false
                ;

                var _InitObjects = function () {
                        _o = $.extend({}, defaults, o);

                        $p = $c.parent(_o.parent);
                        src = $c.data('src');

                        _GetSizes();
                    },

                    _GetSizes = function () {
                        isMobile = $(window).width() < _o.breakPoint;
                    },

                    _CheckImageChange = function () {
                        _GetSizes();

                        var nSrc = (isMobile) ? src.m : src.d,
                            cSrc = $c.prop('src');
                        if (cSrc.indexOf(nSrc) < 0) {
                            _LoadImage(nSrc);
                        }
                    },

                    _LoadImage = function (src) {
                        var $img = $('<img />');
                        $img
                            .load(function (e) {
                                $p.attr('style', 'background-image: url(\'' + src + '\');')
                            })
                            .prop('src', src);
                    },

                    _OnResize = function (e) {
                        clearTimeout(debounce);
                        debounce = setTimeout(function () {
                            clearTimeout(debounce);
                            _CheckImageChange();
                        }, 250);
                    },

                    _BindEvents = function () {
                        $(window).resize(_OnResize);
                    },

                    init = (function () {
                        _InitObjects();
                        _BindEvents();
                        _CheckImageChange();
                    })();
            })($c, options);
    };

    $.fn.bgResponsiveImage = function (options) {
        return this.each(function () {
            if (undefined === $(this).data('bgResponsiveImage')) {
                var plugin = new $.bgResponsiveImage(this, options);
                $(this).data('bgResponsiveImage', plugin);
            }
        });
    };
})(jQuery);
$('.responsive').bgResponsiveImage();