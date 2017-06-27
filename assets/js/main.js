/**
 * @Package: Shipping - Logistics & Transport HTML Template
 * @Since: Shipping 1.0
 * This file is part of Shipping - Logistics & Transport HTML Template package.
 */

jQuery(function($) {

    'use strict';

    var SHIPPING_SETTINGS = window.SHIPPING_SETTINGS || {};



    /*--------------------------------
        FancyBox
     --------------------------------*/

    SHIPPING_SETTINGS.fancyBox = function() {
        if ($.isFunction($.fn.fancybox)) {
            $('.fancybox').fancybox();

            $('.fancybox-media')
                .attr('rel', 'media-gallery')
                .fancybox({
                    openEffect: 'none',
                    closeEffect: 'none',
                    prevEffect: 'none',
                    nextEffect: 'none',
                    arrows: false,
                    helpers: {
                        media: {},
                        buttons: {}
                    }
                });

        }
    }


    /*--------------------------------
        InViewPort Animations
     --------------------------------*/

    SHIPPING_SETTINGS.inViewPortAnimation = function() {

        if ($.isFunction($.fn.viewportChecker)) {

            $('.inviewport').addClass("hiddenthis").viewportChecker({
                classToAdd: 'visiblethis',
                offset: 0,
                callbackFunction: function(elem) {
                    var effect = $(elem).attr("data-effect");
                    $(elem).addClass(effect);
                }
            });

        }

    }


    /*--------------------------------
        Slider Header Carousel
     --------------------------------*/

    SHIPPING_SETTINGS.headerSliderCarousel = function() {

        if ($.isFunction($.fn.owlCarousel)) {

            $("#header-slider").owlCarousel({
                autoPlay: 500000,
                stopOnHover: true,
                navigation: false,
                navigationText: ["<i class='icon icon-chevron-left'>", "<i class='icon icon-chevron-right'>"],
                pagination: true,
                paginationSpeed: 1000,
                goToFirstSpeed: 2000,
                singleItem: true,
                lazyLoad: true,
                autoHeight: true,
                transitionStyle: "fade"
            });

        }

    }

    /*--------------------------------
        Image Carousel (Our Mission Section)
     --------------------------------*/

    SHIPPING_SETTINGS.imageCarousel = function() {

        if ($.isFunction($.fn.owlCarousel)) {

            $("#image-slider").owlCarousel({
                autoPlay: 5000,
                stopOnHover: true,
                navigation: false,
                pagination: true,
                paginationSpeed: 1000,
                goToFirstSpeed: 2000,
                singleItem: true,
                autoHeight: true,
                lazyLoad: true,
                transitionStyle: "fade"
            });

        }

    }

    /*--------------------------------
        Twitter Carousel
     --------------------------------*/

    SHIPPING_SETTINGS.twitterCarousel = function() {

        if ($.isFunction($.fn.owlCarousel)) {

            $("#testimonial-carousel").owlCarousel({
                autoPlay: 3000,
                stopOnHover: true,
                navigation: true,
                pagination: false,
                navigationText: ["<i class='icon icon-chevron-left'>", "<i class='icon icon-chevron-right'>"],
                paginationSpeed: 1000,
                goToFirstSpeed: 2000,
                singleItem: true,
                autoHeight: true,
                transitionStyle: "fade"
            });

        }

    }


    /*--------------------------------
        Team Carousel
     --------------------------------*/

    SHIPPING_SETTINGS.teamCarousel = function() {

        if ($.isFunction($.fn.carousel)) {
            $('#thumb-carousel').carousel({
                interval: 5000
            });
        }
    }

    /*--------------------------------
        Background Video
     --------------------------------*/

    SHIPPING_SETTINGS.backgroundVideo = function() {

        if ($("#bgvid").length) {
            var vid = document.getElementById("bgvid");
            var pauseButton = document.querySelector("#play-button i");
            vid.pause();

            $('#bgvid').on('ended', function () {
                // only functional if "loop" is removed 
                vid.pause();
                // to capture IE10
                vidFade();
            });

            $('#play-button i').on('click', function () {
                vid.classList.toggle("stopfade");
                if (vid.paused) {
                    vid.play();
                    $("#play-button i").toggleClass("icon-play icon-pause");
                } else {
                    vid.pause();
                    $("#play-button i").toggleClass("icon-play icon-pause");
                }
            });
        }


        function vidFade() {
            vid.classList.add("stopfade");
        }


    }

    /*--------------------------------
        Gallery Filtering (MixItUp)
     --------------------------------*/

    SHIPPING_SETTINGS.galleryFiltering = function() {

        if ($.isFunction($.fn.mixItUp)) {

            $('#gallery-mixitup').mixItUp({

                animation: {
                    duration: 480,
                    effects: 'fade translateX(10%) scale(0.25) stagger(58ms)',
                    easing: 'ease'
                },

                selectors: {
                    target: '.filter-item',
                    filter: '.filter-mixitup .filter'
                }

            });

        }
    }

    /*--------------------------------
        Gallery Filtering (Isotope)
     --------------------------------*/

    SHIPPING_SETTINGS.isotopeMasonaryGallery = function() {


        if ($.isFunction($.fn.isotope)) {

            var $container = $('#gallery-isotope');
            $container.isotope({
                filter: '*',
                layoutMode: 'sloppyMasonry',
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });

            $(".filter-isotope .filter").on('click', function() {
                $('.filter-isotope .filter.active').removeClass('active');
                $(this).addClass('active');

                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector,
                    layoutMode: 'sloppyMasonry',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });
                return false;
            });
        }
    }


    /*--------------------------------
        Mobile Menu
     --------------------------------*/

    SHIPPING_SETTINGS.mobileMenu = function() {

        var mobile_str = "";
        $(".menu-ul").each(function() {
            mobile_str += $(this).html();
        });

        $(".menu-mobile ul.menu").html(mobile_str);

        $(".menu-toggle").on('click', function() {
            $(".menu-mobile.cssmenu").toggleClass("open");
            $(this).toggleClass("mdi-menu mdi-close");
        });

        $('.menu-mobile.cssmenu li.has-sub a').on('click', function(e) {
            $(this).parent().children("ul").toggleClass("open");
            $(this).find("i").toggleClass("open");
            e.stopPropagation();
        });
    }



    /*--------------------------------
        Contact AJAX Form
     --------------------------------*/

    SHIPPING_SETTINGS.validateContactForm = function() {

        $("#c_name").on('keyup', function() {
            var name = $("#c_name").val();
            if (name == null || name == "") {
                $("#c_name").removeClass("green");
            } else {
                $("#c_name").addClass("green");
            }
            enable_form();
        });

        $("#c_email").on('keyup', function() {
            var email = $("#c_email").val();
            var atpos = email.indexOf("@");
            var dotpos = email.lastIndexOf(".");

            if (email == null || email == "" || atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
                $("#c_email").removeClass("green");
            } else {
                $("#c_email").addClass("green");
            }
            enable_form();
        });


        $("#c_message").on('keyup', function() {
            var message = $("#c_message").val();
            if (message == null || message == "" || message.length < 9) {
                $("#c_message").removeClass("green");
            } else {
                $("#c_message").addClass("green");
            }

            enable_form();

        });

    }


    SHIPPING_SETTINGS.sendMessageAJAX = function() {

        $("#c_send").on('click', function() {
            if ($(this).hasClass("disabled")) {
                $("#response_email").html("Please Fill in your details correctly and try again");
            } else {

                var email = $('#c_email').val();
                var name = $('#c_name').val();
                var msg = $('#c_message').val();

                var xmlhttp;
                if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 1) {
                        $("#response_email").html("Sending...");
                    }
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        $("#response_email").html(xmlhttp.responseText);
                    }
                }
                xmlhttp.open("POST", "maintainemail.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("email=" + encodeURIComponent(email) + "&name=" + encodeURIComponent(name) + "&msg=" + encodeURIComponent(msg));
                return false;

            }
        });

    }


    function enable_form() {
        if ($("#c_name").hasClass("green") &&
            $("#c_email").hasClass("green") &&
            $("#c_message").hasClass("green")) {
            $("#c_send").removeClass("disabled");
        } else {
            $("#c_send").addClass("disabled");
        }

    }




    /*--------------------------------
        Settings Panel
     --------------------------------*/

    SHIPPING_SETTINGS.settingsPanel = function() {

        $(".settings-panel .toggle").on('click', function() {
            $(".settings-panel").toggleClass("collapsed");
            $(this).toggleClass("icon-settings icon-close");
        });

        $(".settings-panel .colors div").on('click', function() {
            var color = $(this).attr("data-color");
            var colorfile = "";

            if (color == "blue") {
                colorfile = "";
            } else {
                colorfile = "." + color;
            }

            $("#main-style").attr("href", "css/style" + colorfile + ".css");
            $(".settings-panel .colors div").removeClass("active");
            $(this).addClass("active");

            $("#settings-response").load('settings.php', {
                "color": color
            });

            $(".style-dependent").each(function() {
                var src = $(this).attr("src");
                var oldsrc = src;
                src = src.replace("-lightgreen", "-" + color); // lightgreen on top always
                src = src.replace("-darkblue", "-" + color); // darkblue on top always 
                src = src.replace("-yellow", "-" + color);
                src = src.replace("-red", "-" + color);
                src = src.replace("-orange", "-" + color);
                src = src.replace("-blue", "-" + color);
                src = src.replace("-pink", "-" + color);
                src = src.replace("-purple", "-" + color);
                src = src.replace("-teal", "-" + color);
                src = src.replace("-green", "-" + color);

                if (src != oldsrc) {
                    $(this).attr("src", src);
                }

            });



        });


    }


    /*--------------------------------
        Page Loader
     --------------------------------*/

    SHIPPING_SETTINGS.paceOnLoad = function() {

        Pace.on('hide', function() {
            $("body").removeClass("page-loading");
        });
    }

    /******************************
     initialize respective scripts 
     *****************************/
    $(document).ready(function() {
        SHIPPING_SETTINGS.galleryFiltering();
        SHIPPING_SETTINGS.fancyBox();
        SHIPPING_SETTINGS.mobileMenu();
        SHIPPING_SETTINGS.headerSliderCarousel();
        SHIPPING_SETTINGS.twitterCarousel();
        SHIPPING_SETTINGS.imageCarousel();
        SHIPPING_SETTINGS.backgroundVideo();
        SHIPPING_SETTINGS.teamCarousel();
        SHIPPING_SETTINGS.validateContactForm();
        SHIPPING_SETTINGS.sendMessageAJAX();
        SHIPPING_SETTINGS.inViewPortAnimation();
        SHIPPING_SETTINGS.settingsPanel();
        SHIPPING_SETTINGS.paceOnLoad();
    });

    $(window).scroll(function() {});

    $(window).resize(function() {
        SHIPPING_SETTINGS.isotopeMasonaryGallery();
    });

    $(window).load(function() {
        SHIPPING_SETTINGS.isotopeMasonaryGallery();
    });

});
