$(document).ready(function() {
    AOS.init();
    // lozad usage
    const observer = lozad();
    observer.observe();

    index_page = $('.npi_index');
    if (index_page.length > 0) {
        // index page related only
        console.log("Index Page only");
        (() => {
            $('.3-2-1-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 20,
                nav: true,
                dots: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        touchDrag: true
                    },
                    600: {
                        items: 2,
                        touchDrag: true
                    },
                    1000: {
                        items: 3
                    }
                }
            });
            $('.5-3-2-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 20,
                nav: true,
                dots: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 2,
                        touchDrag: true
                    },
                    600: {
                        items: 3,
                        touchDrag: true
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        })();
        single_item_carousel();
    }
    proper_listing = $('.property-listing');
    if (proper_listing.length > 0) {
        console.log("object listing page");
        (() => {
            $('.carousel-single').owlCarousel({
                loop: true,
                autoplay: false,
                margin: 10,
                nav: true,
                dots: false,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        touchDrag: true
                    },
                    600: {
                        items: 1,
                        touchDrag: true
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        })();
    }
    proper_single = $('.property-single');
    if (proper_single.length > 0) {
        single_item_carousel();
    }

    $('.form-builder').on('change', function() {
        console.log($(this).val());
        builderIid = $(this).val();
        if (builderIid) {
            $("#myForm #form-projects").prop('disabled', false);
            $.ajax({
                type: "post",
                url: "ajax_process.php",
                data: "builderId=" + builderIid,
                success: function(e) {
                    console.log(e);
                    $("#myForm #form-projects").html(e);
                }
            });
        } else {
            $("#myForm #form-projects").prop('disabled', true);
        }

    });

    $('.fetch_suggestion').on('change', function() {
        city = $(this).val();
        if (city) {
            $.ajax({
                type: "POST",
                url: "ajax_process.php",
                data: "chosedCity=" + city,
                success: function(e) {
                    $("#suggestions").html(e)
                }
            })
        }
    });

    $('.page-link').on('click', function() {
        console.log("object clicked");
        var e = $(this).attr("id");
        e = document.getElementById("pageNumber").value = e;
        $("#pageIgnitionForm").submit();
    });

    $('.readButton').on('click', () => {
        read_more_paragram();
    });

    $(".projectInquiry").on('click', function() {
        projectID = $(this).attr("id");
        console.log("project enq");
        console.log(projectID);
        if (projectID) {
            $.ajax({
                url: "ajax_process.php",
                method: "POST",
                data: { project_id: projectID },
                dataType: "json",
                success: function(data) {
                    $("#project_name").val(data.project_name),
                        $("#project_id").val(data.project_id),
                        $("#enquire").modal("show")
                }
            });
        }
    });

    read_more_paragram = () => {
        document.querySelectorAll('.readMoreDescription').forEach((e) => {
            e.classList.toggle("showMoreText");
            this.textContent = e.classList.contains("showMoreText") ? "Read Less" : "Read More"
        });
    }

    function scrollSide(e, t, o, n, c) { scrollAmount = 0; var i = setInterval((function() { "left" == t ? e.scrollLeft -= c : e.scrollLeft += c, scrollAmount += c, scrollAmount >= n && window.clearInterval(i) }), o) }
    $(".arrow-left").click((function() {
        console.log("object left");
        scrollSide(document.getElementById("footer-links-primary-ul-main"), "left", 25, 500, 10)
    }));
    $(".arrow-right").click((function() {
        console.log("object right");
        scrollSide(document.getElementById("footer-links-primary-ul-main"), "right", 25, 500, 10)
    }));

    function single_item_carousel() {
        console.log("object index city");
        $('.carousel-single').owlCarousel({
            loop: true,
            autoplay: false,
            margin: 10,
            nav: true,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    touchDrag: true
                },
                600: {
                    items: 1,
                    touchDrag: true
                },
                1000: {
                    items: 1
                }
            }

        });
    }



});