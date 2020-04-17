jQuery(function($) {

    $(document).ready(function() {

        $('#table').DataTable({
            "scrollY": "70vh",
            "scrollX": true,
            "scrollCollapse": true,
            "paging": true,
            "responsive": true,
            "bAutoWidth": true,
            "bInfo": false,
            "paging": false,
            "bPaginate": false,
            "searching": false
        });

        let width = $(window).width();
        if (width < 768) {
            if (!$(".page-wrapper").hasClass("pinned")) {
                $(".page-wrapper").addClass("pinned");
                $("#sidebar").hover(
                    function() {
                        $(".page-wrapper").addClass("sidebar-hovered");
                    },
                    function() {
                        $(".page-wrapper").removeClass("sidebar-hovered");
                    }
                );
            }
        } else {
            if ($(".page-wrapper").hasClass("pinned")) {
                $(".page-wrapper").removeClass("pinned");
                $("#sidebar").unbind("hover");
            }
        }
        scrollSidebar();
    });

    $(window).resize(function() {
        let width = $(window).width();
        if (width < 768) {
            if (!$(".page-wrapper").hasClass("pinned")) {
                $(".page-wrapper").addClass("pinned");
                $("#sidebar").hover(
                    function() {
                        console.log("mouseenter");
                        $(".page-wrapper").addClass("sidebar-hovered");
                    },
                    function() {
                        console.log("mouseout");
                        $(".page-wrapper").removeClass("sidebar-hovered");
                    }
                );
            }
        } else {
            if ($(".page-wrapper").hasClass("pinned")) {
                // unpin sidebar when hovered
                $(".page-wrapper").removeClass("pinned");
                $("#sidebar").unbind("hover");
            }
        }
        scrollSidebar();
    });

    $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if ($(this).parent().hasClass("active")) {
            $(".sidebar-dropdown").removeClass("active");
            $(this).parent().removeClass("active");
        } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this).next(".sidebar-submenu").slideDown(200);
            $(this).parent().addClass("active");
        }
    });

    //toggle sidebar
    $("#toggle-sidebar").click(function() {
        $(".page-wrapper").toggleClass("toggled");
    });

    $("#pin-sidebar").click(function() {
        if ($(".page-wrapper").hasClass("pinned")) {
            // unpin sidebar when hovered
            $(".page-wrapper").removeClass("pinned");
            $("#sidebar").unbind("hover");
        } else {
            $(".page-wrapper").addClass("pinned");
            $("#sidebar").hover(
                function() {
                    console.log("mouseenter");
                    $(".page-wrapper").addClass("sidebar-hovered");
                },
                function() {
                    console.log("mouseout");
                    $(".page-wrapper").removeClass("sidebar-hovered");
                }
            );
        }
    });
    //toggle sidebar overlay
    $("#overlay").click(function() {
        $(".page-wrapper").toggleClass("toggled");
    });

    function scrollSidebar() {
        if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $(".sidebar-content").mCustomScrollbar({
                axis: "y",
                autoHideScrollbar: true,
                scrollInertia: 300
            });
            $(".sidebar-content").addClass("desktop");
        }
    }
});