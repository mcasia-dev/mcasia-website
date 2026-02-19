<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"> <!--<![endif]-->

<head>
    <title>Product Catalog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="product_catalog_flip_page_assets/extras/jquery.min.1.7.js"></script>
    <script type="text/javascript" src="product_catalog_flip_page_assets/extras/modernizr.2.5.3.min.js"></script>
    <script type="text/javascript" src="product_catalog_flip_page_assets/lib/hash.js"></script>

    <style>
        .back-btn {
            position: fixed;
            /* keeps it visible even when scrolling */
            z-index: 9999;
            /* very high so it stays on top */

        }
    </style>
    <button type="button" class="btn btn-primary back-btn" onclick="window.location.href='/'">Home</button>


</head>

<body>

    <div id="canvas">


        <div class="zoom-icon zoom-icon-in"></div>


        <div class="magazine-viewport">
            <div class="container">
                <div class="magazine">
                    <!-- Next button -->
                    <div ignore="1" class="next-button"></div>
                    <!-- Previous button -->
                    <div ignore="1" class="previous-button"></div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">

        function loadApp() {

            $('#canvas').fadeIn(1000);

            var flipbook = $('.magazine');

            // Check if the CSS was already loaded

            if (flipbook.width() == 0 || flipbook.height() == 0) {
                setTimeout(loadApp, 10);
                return;
            }

            // Create the flipbook

            flipbook.turn({

                // Magazine width

                width: 922,

                // Magazine height

                height: 600,

                // Duration in millisecond

                duration: 1000,

                // Hardware acceleration

                acceleration: !isChrome(),

                // Enables gradients

                gradients: true,

                // Auto center this flipbook

                autoCenter: true,

                // Elevation from the edge of the flipbook when turning a page

                elevation: 50,

                // The number of pages

                pages: 40,

                // Events

                when: {
                    turning: function (event, page, view) {

                        var book = $(this),
                            currentPage = book.turn('page'),
                            pages = book.turn('pages');

                        // Update the current URI

                        Hash.go('page/' + page).update();

                        // Show and hide navigation buttons

                        disableControls(page);


                        $('.thumbnails .page-' + currentPage).
                            parent().
                            removeClass('current');

                        $('.thumbnails .page-' + page).
                            parent().
                            addClass('current');



                    },

                    turned: function (event, page, view) {

                        disableControls(page);

                        $(this).turn('center');

                        if (page == 1) {
                            $(this).turn('peel', 'br');
                        }

                    },

                    missing: function (event, pages) {

                        // Add pages that aren't in the magazine

                        for (var i = 0; i < pages.length; i++)
                            addPage(pages[i], $(this));

                    }
                }

            });

            // Zoom.js

            $('.magazine-viewport').zoom({
                flipbook: $('.magazine'),

                max: function () {

                    return largeMagazineWidth() / $('.magazine').width();

                },

                when: {

                    swipeLeft: function () {

                        $(this).zoom('flipbook').turn('next');

                    },

                    swipeRight: function () {

                        $(this).zoom('flipbook').turn('previous');

                    },

                    resize: function (event, scale, page, pageElement) {

                        if (scale == 1)
                            loadSmallPage(page, pageElement);
                        else
                            loadLargePage(page, pageElement);

                    },

                    zoomIn: function () {

                        $('.thumbnails').hide();
                        $('.made').hide();
                        $('.magazine').removeClass('animated').addClass('zoom-in');
                        $('.zoom-icon').removeClass('zoom-icon-in').addClass('zoom-icon-out');

                        if (!window.escTip && !$.isTouch) {
                            escTip = true;

                            $('<div />', { 'class': 'exit-message' }).
                                html('<div>Press ESC to exit</div>').
                                appendTo($('body')).
                                delay(2000).
                                animate({ opacity: 0 }, 500, function () {
                                    $(this).remove();
                                });
                        }
                    },

                    zoomOut: function () {

                        $('.exit-message').hide();
                        $('.thumbnails').fadeIn();
                        $('.made').fadeIn();
                        $('.zoom-icon').removeClass('zoom-icon-out').addClass('zoom-icon-in');

                        setTimeout(function () {
                            $('.magazine').addClass('animated').removeClass('zoom-in');
                            resizeViewport();
                        }, 0);

                    }
                }
            });

            // Zoom event

            if ($.isTouch)
                $('.magazine-viewport').bind('zoom.doubleTap', zoomTo);
            else
                $('.magazine-viewport').bind('zoom.tap', zoomTo);


            // Using arrow keys to turn the page

            $(document).keydown(function (e) {

                var previous = 37, next = 39, esc = 27;

                switch (e.keyCode) {
                    case previous:

                        // left arrow
                        $('.magazine').turn('previous');
                        e.preventDefault();

                        break;
                    case next:

                        //right arrow
                        $('.magazine').turn('next');
                        e.preventDefault();

                        break;
                    case esc:

                        $('.magazine-viewport').zoom('zoomOut');
                        e.preventDefault();

                        break;
                }
            });

            // URIs - Format #/page/1

            Hash.on('^page\/([0-9]*)$', {
                yep: function (path, parts) {
                    var page = parts[1];

                    if (page !== undefined) {
                        if ($('.magazine').turn('is'))
                            $('.magazine').turn('page', page);
                    }

                },
                nop: function (path) {

                    if ($('.magazine').turn('is'))
                        $('.magazine').turn('page', 1);
                }
            });


            $(window).resize(function () {
                resizeViewport();
            }).bind('orientationchange', function () {
                resizeViewport();
            });

            // Events for thumbnails

            $('.thumbnails').click(function (event) {

                var page;

                if (event.target && (page = /page-([0-9]+)/.exec($(event.target).attr('class')))) {

                    $('.magazine').turn('page', page[1]);
                }
            });

            $('.thumbnails li').
                bind($.mouseEvents.over, function () {

                    $(this).addClass('thumb-hover');

                }).bind($.mouseEvents.out, function () {

                    $(this).removeClass('thumb-hover');

                });

            if ($.isTouch) {

                $('.thumbnails').
                    addClass('thumbanils-touch').
                    bind($.mouseEvents.move, function (event) {
                        event.preventDefault();
                    });

            } else {

                $('.thumbnails ul').mouseover(function () {

                    $('.thumbnails').addClass('thumbnails-hover');

                }).mousedown(function () {

                    return false;

                }).mouseout(function () {

                    $('.thumbnails').removeClass('thumbnails-hover');

                });

            }


            // Events for the next button

            $('.next-button').bind($.mouseEvents.over, function () {

                $(this).addClass('next-button-hover');

            }).bind($.mouseEvents.out, function () {

                $(this).removeClass('next-button-hover');

            }).bind($.mouseEvents.down, function () {

                $(this).addClass('next-button-down');

            }).bind($.mouseEvents.up, function () {

                $(this).removeClass('next-button-down');

            }).click(function () {

                $('.magazine').turn('next');

            });

            // Events for the next button

            $('.previous-button').bind($.mouseEvents.over, function () {

                $(this).addClass('previous-button-hover');

            }).bind($.mouseEvents.out, function () {

                $(this).removeClass('previous-button-hover');

            }).bind($.mouseEvents.down, function () {

                $(this).addClass('previous-button-down');

            }).bind($.mouseEvents.up, function () {

                $(this).removeClass('previous-button-down');

            }).click(function () {

                $('.magazine').turn('previous');

            });


            resizeViewport();

            $('.magazine').addClass('animated');

        }

        // Zoom icon

        $('.zoom-icon').bind('mouseover', function () {

            if ($(this).hasClass('zoom-icon-in'))
                $(this).addClass('zoom-icon-in-hover');

            if ($(this).hasClass('zoom-icon-out'))
                $(this).addClass('zoom-icon-out-hover');

        }).bind('mouseout', function () {

            if ($(this).hasClass('zoom-icon-in'))
                $(this).removeClass('zoom-icon-in-hover');

            if ($(this).hasClass('zoom-icon-out'))
                $(this).removeClass('zoom-icon-out-hover');

        }).bind('click', function () {

            if ($(this).hasClass('zoom-icon-in'))
                $('.magazine-viewport').zoom('zoomIn');
            else if ($(this).hasClass('zoom-icon-out'))
                $('.magazine-viewport').zoom('zoomOut');

        });

        $('#canvas').hide();


        // Load the HTML4 version if there's not CSS transform

        yepnope({
            test: Modernizr.csstransforms,
            yep: ['product_catalog_flip_page_assets/lib/turn.js'],
            nope: ['product_catalog_flip_page_assets/lib/turn.html4.min.js'],
            both: ['product_catalog_flip_page_assets/lib/zoom.min.js', 'product_catalog_flip_page_assets/js/magazine.js', 'product_catalog_flip_page_assets/css/magazine.css'],
            complete: loadApp
        });

    </script>

</body>

</html>
