$(document).ready(function() {
    index_page = $('.npi_index');
    if (index_page.length > 0) {
        // index page related only
        console.log("Index Page");
        $('.hot-projects-carousel').owlCarousel({
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
    }
});