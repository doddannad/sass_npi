$(document).ready(function() {
    index_page = $('.npi_index');
    if (index_page.length > 0) {
        // index page related only
        console.log("Index Page");
        (() => {
            $('.3-2-1-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                margin: 20,
                nav: true,
                dots: false,
                responsiveClass: true,
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
            });
            $('.5-3-2-carousel').owlCarousel({
                loop: true,
                autoplay: true,
                margin: 20,
                nav: true,
                dots: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        })();
    }
    proper_listing = $('.property-listing');
    if (proper_listing.length > 0) {
        (() => {
            $('.carousel-single').owlCarousel({
                loop: true,
                autoplay: true,
                margin: 10,
                nav: true,
                dots: false,
                items: 1
            })
        })();
    }
    proper_single = $('.property-single');
    if (proper_single.length > 0) {
        (() => {
            $('.carousel-single').owlCarousel({
                loop: true,
                autoplay: true,
                margin: 10,
                nav: true,
                dots: false,
                items: 1

            })
        })();
    }

});