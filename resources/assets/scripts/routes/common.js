// import {tns} from "./node_modules/tiny-slider/src/tiny-slider"
import {tns} from './../../../../node_modules/tiny-slider/src/tiny-slider';

export default {
    init() {
        // JavaScript to be fired on all pages
    },
    finalize() {
        // JavaScript to be fired on all pages, after page specific JS is fired
        if (document.getElementById('partnerCarousel')) {
            tns({
                container: '#partnerCarousel',
                items: 3,
                slideBy: 'page',
                nav: false,
                controls: false,
                arrowKeys: true,
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 20,
                lazyload: true,
                responsive: {
                    0: {
                        items: 2,
                    },
                    576: {
                        items: 3,
                    },
                    768: {
                        items: 4,
                    },
                    992: {
                        items: 6,
                    },
                },
            });
        }

        if (document.getElementById('memberCarousel')) {
            tns({
                container: '#memberCarousel',
                items: 3,
                slideBy: 'page',
                nav: true,
                navContainer: '#customize-nav',
                controls: false,
                arrowKeys: false,
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 20,
                lazyload: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                        gutter: 40,
                    },
                },
            });
        }

        if (document.getElementById('appCarousel')) {
            tns({
                container: '#appCarousel',
                items: 2,
                slideBy: 'page',
                nav: true,
                navContainer: '#customize-nav-app',
                controls: false,
                arrowKeys: false,
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 20,
                lazyload: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                        gutter: 40,
                    },
                },
            });
        }

        if (document.getElementById('heroCarousel')) {
            tns({
                container: '#heroCarousel',
                items: 1,
                slideBy: 'page',
                nav: true,
                navContainer: '#customize-nav-hero',
                controls: false,
                arrowKeys: false,
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                lazyload: true,
            });
        }

        document.getElementById('mobileButton').addEventListener('click', function () {
            document.getElementsByTagName('body')[0].classList.toggle('mobile_menu');
        })

        window.addEventListener('resize', function () {
            if (window.innerWidth > 767) {
                document.getElementsByTagName('body')[0].classList.remove('mobile_menu');
            }
        })
    },
};