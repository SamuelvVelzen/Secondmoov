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
    },
};
