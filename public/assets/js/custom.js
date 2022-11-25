// Header Fixed Css Here

$(window).scroll(function () {
    if ($(window).scrollTop() >= 300) {
        $('#myHeader').addClass('fixed-header');
    }
    else {
        $('#myHeader').removeClass('fixed-header');
    }
});

$(document).ready(function () {
    $('.navbar-toggler,.close').click(function () {
        $('body').toggleClass('show-sidebar');
    })
})

// Read More Button

$(document).ready(function () {
    $('#more_content').slideUp();
    $('#read_more').click(function () {
        $('#more_content').slideToggle();
        if ($(this).text() == 'Read less') {
            $(this).html('Read More');
        }
        else {
            $(this).html('Read less');
        }
    });

    // featured_carousel
    if ($('.featured-emp-carousel .owl-carousel').length > 0) {
        $('.featured-emp-carousel .owl-carousel').owlCarousel({
            rtl: true,
            loop: true,
            margin: 20,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        })
    }

    // owl-carousel Carousel
    if ($('.featured-carousel .owl-carousel').length > 0) {
        $('.featured-carousel .owl-carousel').owlCarousel({
            rtl: true,
            loop: true,
            margin: 20,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    }



    // owl-carousel Carousel
    if ($('.owl-carousel').length > 0) {
        $('.owl-carousel').owlCarousel({
            rtl: true,
            loop: true,
            margin: 20,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 5
                }
            }
        });
    }
});

// tools-section
if ($('.tools-section .owl-carousel').length > 0) {
    $('.tools-section .owl-carousel').owlCarousel({
        rtl: true,
        loop: false,
        autoplay: true,
        nav: true,
        margin: 20,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })
}












