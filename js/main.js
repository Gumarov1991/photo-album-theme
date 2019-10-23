

jQuery(document).ready(function( $ ) {


    $(document).on('click', function(e) {
        console.log(e.target)
    });
    
    let allGalleries = $('.gallery'),
        logo = $('#logo'),
        nav = $('.nav-page');

    for (let i = 0; i < allGalleries.length; i++) {
        if ($(allGalleries[i]).get(0).scrollWidth > $(allGalleries[i]).get(0).clientWidth) {
            $(allGalleries[i]).addClass('scrolling');
        }
    }

    let pagesObject = new Pageable("#main", {
        childSelector: "[data-anchor]", // CSS3 selector string for the pages
        anchors: [], // define the page anchors
        pips: true, // display the pips
        animation: 1000, // the duration in ms of the scroll animation
        delay: 300, // the delay in ms before the scroll animation starts
        throttle: 50, // the interval in ms that the resize callback is fired
        orientation: "vertical", // or horizontal
        swipeThreshold: 50, // swipe / mouse drag distance (px) before firing the page change event
        freeScroll: false, // allow manual scrolling when dragging instead of automatically moving to next page
        navPrevEl: false, // define an element to use to scroll to the previous page (CSS3 selector string or Element reference)
        navNextEl: false, // define an element to use to scroll to the next page (CSS3 selector string or Element reference)
        infinite: false, // enable infinite scrolling (from 0.4.0)
        events: {
            wheel: true, // enable / disable mousewheel scrolling
            mouse: false, // enable / disable mouse drag scrolling
            touch: true, // enable / disable touch / swipe scrolling
            keydown: true, // enable / disable keyboard navigation
        },
        easing: function(currentTime, startPos, endPos, interval) {
            return -endPos * (currentTime /= interval) * (currentTime - 2) + startPos;
        },
        onInit: function() {},
        onUpdate: function() {},
        onBeforeStart: function() {
            this.pages.forEach((page, i) => {
                page.classList.remove("pg-active");
            })

            logo.removeClass('fadeInLeft').addClass('fadeOutLeft');
            nav.removeClass('fadeInRight').addClass('fadeOutRight');
        },
        onStart: function() {
            nav.css('display', 'none');
        },
        onScroll: function() {},
        onFinish: function() {
            logo.removeClass('fadeOutLeft').addClass('fadeInLeft');
            nav.css('display', 'block').removeClass('fadeOutRight').addClass('fadeInRight');

            for (let i = 0; i < this.pages.length; i++) {
                if ($(this.pages[i]).hasClass('pg-active')
                && $(this.pages[i]).children().children('.gallery').hasClass('scrolling')) {
                    $(".scrolling .demo-gallery-poster").hover(function(){
                        pagesObject.events.wheel = false;
                    },function(){
                        pagesObject.events.wheel = true;
                    });
                }
            }

            if ($(this.pages[0]).hasClass('pg-active')) {
                logo.addClass('homeLogo').removeClass('otherLogo').children('p').css('color', '#fff');
                $('.pg-pips a').css({
                    'background': '#fff'
                })
            } else {
                logo.removeClass('homeLogo').addClass('otherLogo').children('p').css('color', '#848484');
                $('.pg-pips a').css({
                    'background': '#848484'
                })
            }

            if ($(this.pages[0]).hasClass('pg-active')) {
                nav.css('display', 'none');
                console.log('display');
            } else {
                nav.css('display', 'block');
            }
        }
    });

    $('#up-page').on('click', function() {
        console.log('работатет');
        pagesObject.prev();
    });

    $('#down-page').on('click', function() {
        console.log('работатет');
        pagesObject.next();
    });

    $("#main-slider").lightSlider({
        item: 1,
        auto: true,
        loop: true,
        pause: 6000,
        controls: false,
        gallery: false,
        speed: 3000,
        mode: 'fade',
        pager: false,
        enableDrag: false
    });

    $('.scrolling').mousewheel(function(e, delta) {
        let indent = $('.scrolling').scrollLeft() - (delta * 300);
        $('.scrolling').stop().animate({scrollLeft: indent}, 300);
        return false;
    });

    allGalleries.lightGallery({
        thumbnail:true,
        download: false,
        hideBarsDelay: 3000
    });

    allGalleries.on('onAfterOpen.lg', function() {
        console.log('запустили')
        let idleState = false,
            idleWait = 3000,
            thumbspanel = $('.lg-thumb-outer'),
            idleTimer = setTimeout(function () {
                // Действия на отсутствие пользователя
                thumbspanel.addClass('fadeOutDown');
                console.log(`Вы отсутствовали более чем  ${idleWait/1000} секунд`);
                idleState = true;
            }, idleWait);

        thumbspanel.addClass('animated');

        $(document).bind('mousemove keydown scroll', function() {
            clearTimeout(idleTimer); // отменяем прежний временной отрезок
            if (idleState == true) {
                // Действия на возвращение пользователя
                console.log('с возвращением');
                thumbspanel.removeClass('fadeOutDown').addClass('fadeInUp');
            }

            idleState = false;
            idleTimer = setTimeout(function () {
                // Действия на отсутствие пользователя
                thumbspanel.removeClass('fadeInUp').addClass('fadeOutDown');
                console.log(`Вы отсутствовали более чем  ${idleWait/1000} секунд`);
                idleState = true;
            }, idleWait);
        })
    })
});