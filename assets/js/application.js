$(document).ready(function() {
    index_page = $('.npi_index');
    if (index_page.length > 0) {
        // index page related only
        console.log("Index Page");
        $('.3-2-1-carousel').owlCarousel({
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            loop: true,
            autoplay: true,
            margin: 20,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3,
                    dots: true
                }
            }
        })
        $('.5-3-2-carousel').owlCarousel({
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            loop: true,
            autoplay: true,
            margin: 20,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4,
                    dots: true
                }
            }
        })
    }
});