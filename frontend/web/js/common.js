$(document).ready(function() {

    function calcHeightRightBlock() {
        $('.right-block').height($('.wrapper').height());
    }

    $(".gallery").owlCarousel({
        items : 4,
        responsive : {
            0 : {
                items: 1
            },
            480 : {
                items: 2
            },
            768 : {
                items: 3,
            },
            1200 : {
                items: 4,
            }
        },

        loop: true,
        margin: 30,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 4000,
        smartSpeed: 1000,
    });

    $('.gallery-item').magnificPopup({
        type:'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        },
        gallery:{
            enabled:true
        }
    });

    $('.sight-item a').magnificPopup({
        type:'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        },
        gallery:{
            enabled:true
        }
    });

    // calcHeightRightBlock();
    //
    // $('.wrapper').onresize(function () {
    //     calcHeightRightBlock();
    // });
    //
    // $('#order').stick_in_parent();

    $('#description ul').addClass('advantage');

    $('#description ul li').each(function () {
        $(this).html('<span class="advantage-item">' + $(this).html() + '</span>');
    })

    $('#description .tolink-owner').click(function (e) {
        e.preventDefault();
        $('#description .link-owner').toggle(400);
    })

    $('#comfort .tocomfort-full').click(function (e) {
        e.preventDefault();
        $('#comfort .comfort-full').toggle(400);
    })
});