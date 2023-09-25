(function ($) {
    "use strict";

    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: "fade-in",
        outClass: "fade-out",
        inDuration: 1500,
        outDuration: 800,
        linkElement: ".animsition-link",
        loading: true,
        loadingParentElement: "html",
        loadingClass: "animsition-loading-1",
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: ["animation-duration", "-webkit-animation-duration"],
        overlay: false,
        overlayClass: "animsition-overlay-slide",
        overlayParentElement: "html",
        transition: function (url) {
            window.location.href = url;
        },
    });

    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height() / 2;

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css("display", "flex");
        } else {
            $("#myBtn").css("display", "none");
        }
    });

    $("#myBtn").on("click", function () {
        $("html, body").animate({ scrollTop: 0 }, 300);
    });

    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $(".container-menu-desktop");
    var wrapMenu = $(".wrap-menu-desktop");

    if ($(".top-bar").length > 0) {
        var posWrapHeader = $(".top-bar").height();
    } else {
        var posWrapHeader = 0;
    }

    if ($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass("fix-menu-desktop");
        $(wrapMenu).css("top", 0);
    } else {
        $(headerDesktop).removeClass("fix-menu-desktop");
        $(wrapMenu).css("top", posWrapHeader - $(this).scrollTop());
    }

    $(window).on("scroll", function () {
        if ($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass("fix-menu-desktop");
            $(wrapMenu).css("top", 0);
        } else {
            $(headerDesktop).removeClass("fix-menu-desktop");
            $(wrapMenu).css("top", posWrapHeader - $(this).scrollTop());
        }
    });

    /*==================================================================
    [ Menu mobile ]*/
    $(".btn-show-menu-mobile").on("click", function () {
        $(this).toggleClass("is-active");
        $(".menu-mobile").slideToggle();
    });

    var arrowMainMenu = $(".arrow-main-menu-m");

    for (var i = 0; i < arrowMainMenu.length; i++) {
        $(arrowMainMenu[i]).on("click", function () {
            $(this).parent().find(".sub-menu-m").slideToggle();
            $(this).toggleClass("turn-arrow-main-menu-m");
        });
    }

    $(window).resize(function () {
        if ($(window).width() >= 992) {
            if ($(".menu-mobile").css("display") == "block") {
                $(".menu-mobile").css("display", "none");
                $(".btn-show-menu-mobile").toggleClass("is-active");
            }

            $(".sub-menu-m").each(function () {
                if ($(this).css("display") == "block") {
                    console.log("hello");
                    $(this).css("display", "none");
                    $(arrowMainMenu).removeClass("turn-arrow-main-menu-m");
                }
            });
        }
    });

    /*==================================================================
    [ Show / hide modal search ]*/
    $(".js-show-modal-search").on("click", function () {
        $(".modal-search-header").addClass("show-header-cart");
        // $(this).css("opacity", "0");
    });

    $(".js-hide-modal-search").on("click", function () {
        $(".modal-search-header").removeClass("show-header-cart");
        // $(".js-show-modal-search").css("opacity", "1");
    });

    // $(".container-search-header").on("click", function (e) {
    //     e.stopPropagation();
    // });

    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $(".isotope-grid");
    var $filter = $(".filter-tope-group");

    // filter items on button click
    $filter.each(function () {
        $filter.on("click", "button", function () {
            var filterValue = $(this).attr("data-filter");
            $topeContainer.isotope({ filter: filterValue });
        });
    });

    // init Isotope
    $(window).on("load", function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: ".isotope-item",
                layoutMode: "fitRows",
                percentPosition: true,
                animationEngine: "best-available",
                masonry: {
                    columnWidth: ".isotope-item",
                },
            });
        });
    });

    var isotopeButton = $(".filter-tope-group button");

    $(isotopeButton).each(function () {
        $(this).on("click", function () {
            for (var i = 0; i < isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass("how-active1");
            }

            $(this).addClass("how-active1");
        });
    });

    /*==================================================================
    [ Filter / Search product ]*/
    $(".js-show-filter").on("click", function () {
        $(this).toggleClass("show-filter");
        $(".panel-filter").slideToggle(400);

        if ($(".js-show-search").hasClass("show-search")) {
            $(".js-show-search").removeClass("show-search");
            $(".panel-search").slideUp(400);
        }
    });

    $(".js-show-search").on("click", function () {
        $(this).toggleClass("show-search");
        $(".panel-search").slideToggle(400);

        if ($(".js-show-filter").hasClass("show-filter")) {
            $(".js-show-filter").removeClass("show-filter");
            $(".panel-filter").slideUp(400);
        }
    });

    /*==================================================================
    [ Cart ]*/

    $(".js-hide-cart").on("click", function () {
        $(".js-panel-cart").removeClass("show-header-cart");
    });

    /*==================================================================
    [ Cart ]*/
    $(".js-show-sidebar").on("click", function () {
        $(".js-sidebar").addClass("show-sidebar");
    });

    $(".js-hide-sidebar").on("click", function () {
        $(".js-sidebar").removeClass("show-sidebar");
    });

    /*==================================================================
    [ +/- num product ]*/
    $(".subquantity").on("click", function () {
        var numProduct = Number($(".cartquantity").val());
        if (numProduct > 0) $(".cartquantity").val(numProduct - 1);
    });

    $(".addquantity").on("click", function () {
        var numProduct = Number($(".cartquantity").val());

        $(".cartquantity").val(numProduct + 1);
    });

    $(".subquantityquick").on("click", function () {
        var numProduct = Number($(".cartquantityquick").val());
        if (numProduct > 0) $(".cartquantityquick").val(numProduct - 1);
    });

    $(".addquantityquick").on("click", function () {
        var numProduct = Number($(".cartquantityquick").val());

        $(".cartquantityquick").val(numProduct + 1);
    });

    $(".cartdetailadd").on("click", function () {
        var numProduct = Number($(this).prev().val());
        $(this)
            .prev()
            .val(numProduct + 1);
    });
    $(".cartdetailsub").on("click", function () {
        var numProduct = Number($(this).next().val());
        if (numProduct > 0) {
            $(this)
                .next()
                .val(numProduct - 1);
        }
    });
    // $(".btn-num-product-down").on("click", function () {
    //     var numProduct = Number($(this).next().val());
    //     if (numProduct > 0)
    //         $(this)
    //             .next()
    //             .val(numProduct - 1);
    // });

    // $(".btn-num-product-up").on("click", function () {
    //     var numProduct = Number($(this).prev().val());
    //     $(this)
    //         .prev()
    //         .val(numProduct + 1);
    // });

    /*==================================================================
    [ Rating ]*/
    $(".wrap-rating").each(function () {
        var item = $(this).find(".item-rating");
        var rated = -1;
        var input = $(this).find("input");
        $(input).val(0);

        $(item).on("mouseenter", function () {
            var index = item.index(this);
            var i = 0;
            for (i = 0; i <= index; i++) {
                $(item[i]).removeClass("zmdi-star-outline");
                $(item[i]).addClass("zmdi-star");
            }

            for (var j = i; j < item.length; j++) {
                $(item[j]).addClass("zmdi-star-outline");
                $(item[j]).removeClass("zmdi-star");
            }
        });

        $(item).on("click", function () {
            var index = item.index(this);
            rated = index;
            $(input).val(index + 1);
        });

        $(this).on("mouseleave", function () {
            var i = 0;
            for (i = 0; i <= rated; i++) {
                $(item[i]).removeClass("zmdi-star-outline");
                $(item[i]).addClass("zmdi-star");
            }

            for (var j = i; j < item.length; j++) {
                $(item[j]).addClass("zmdi-star-outline");
                $(item[j]).removeClass("zmdi-star");
            }
        });
    });

    /*==================================================================
    [ Show modal1 ]*/
    $(".js-show-modal1").on("click", function (e) {
        e.preventDefault();
        $(".js-modal1").addClass("show-modal1");
    });

    $(".js-hide-modal1").on("click", function () {
        $(".js-modal1").removeClass("show-modal1");
    });

    $(".js-show-login-modal").on("click", function (e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

        // Hiển thị cửa sổ modal đăng nhập
        $(".js-login-modal").addClass("show-modal1");
    });
    // Khi người dùng nhấp vào nút đóng trong cửa sổ modal đăng nhập
    $(".js-hide-login-modal").on("click", function () {
        // Đóng cửa sổ modal đăng nhập
        $(".js-login-modal").removeClass("show-modal1");
    });

    $(".js-show-register-modal").on("click", function (e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

        // Hiển thị cửa sổ modal đăng nhập
        $(".js-register-modal").addClass("show-modal1");
    });
    // Khi người dùng nhấp vào nút đóng trong cửa sổ modal đăng nhập
    $(".js-hide-register-modal").on("click", function () {
        // Đóng cửa sổ modal đăng nhập
        $(".js-register-modal").removeClass("show-modal1");
    });

    //changepassword
    $("#changePassword").on("click", function (e) {
        e.preventDefault();
        $(".js-changepassword-modal").addClass("show-modal1");
    });
    $(".js-hide-changepassword-modal").on("click", function (e) {
        $(".js-changepassword-modal").removeClass("show-modal1");
    });

    //user-changepassword
    $(".username").on("click", function (e) {
        e.preventDefault();
        $(".changepassword").toggle();
    });

    ////// COMMENT ////////////
    $(".item-rating").click(function () {
        var rating = $(this).data("rating"); // Lấy giá trị data-rating từ ngôi sao được click
        $("#rating").val(rating); // Gán giá trị rating vào input
        // Đánh giá vizual (thay đổi màu sắc các ngôi sao đã chọn)
        $(".item-rating").removeClass("zmdi-star");
        $(".item-rating").removeClass("zmdi-star-outline");
        $(".item-rating").addClass("zmdi-star-outline");
        $(this).prevAll().addBack().addClass("zmdi-star");
    });

    $(document).ready(function () {
        var route = $(".commentform").data("route");
        var productid = $(".productidcmt").data("productidcmt");
        $(".commentform").submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: route,
                type: "POST",
                data: $(".commentform").serialize(),
                success: function (response) {
                    console.log(response.message);
                    $("#review").val("");
                    loadcomment(productid);
                },
                error: function (xhr) {
                    console.log(xhr);
                },
            });
        });
        function loadcomment(productid) {
            $.ajax({
                url: route,
                type: "GET",
                success: function (response) {
                    console.log(response.name);
                    var html = `<div class="flex-w flex-t p-b-68 ">
                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                            <img src="/home/images/avatar-01.jpg" alt="AVATAR">
                        </div>
                
                        <div class="size-207">
                            <div class="flex-w flex-sb-m p-b-17">
                                <span class="mtext-107 cl2 p-r-20">
                                    ${response.name}
                                </span>

                                <span class="wrap-rating fs-18 cl11 pointer">
                                    ${(() => {
                                        var starsHTML = "";
                                        for (var i = 1; i <= 5; i++) {
                                            if (response.rate >= i) {
                                                starsHTML += `<i class=" zmdi zmdi-star" data-rating="${i}"></i>`;
                                            } else {
                                                starsHTML += `<i class=" zmdi zmdi-star-outline" data-rating="${i}"></i>`;
                                            }
                                        }
                                        return starsHTML;
                                    })()}
                                </span>
                            </div>
                
                            <p class="stext-102 cl6">
                                ${response.content}
                            </p>
                        </div>
                    </div>`;
                    $("#showcomments").append(html);
                },
                error: function (xhr) {
                    console.log(xhr);
                },
            });
        }
    });
    ///// HANDLE CART ///////
    $(document).ready(function () {
        var route = $(".formaddcart").data("route");

        $(".formaddcart").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: route,
                type: "POST",
                data: $(".formaddcart").serialize(),
                success: function (response) {},
                error: function (xhr) {
                    console.log(xhr);
                },
            });
        });
    });

    //// Animation Cartdetail /////
    $(document).ready(function loadanimation() {
        const loader = $("#loader");
        const loadContentButtonAdd = $(".cartdetailadd");
        const loadContentButtonSub = $(".cartdetailsub");
        const overlay = $("#overlay");

        loadContentButtonAdd.on("click", function () {
            loader.addClass("active");
            overlay.show();
            $("body").css("pointer-events", "none");

            setTimeout(function () {
                loader.removeClass("active");
                overlay.hide();
                $("body").css("pointer-events", "");
            }, 2000);
        });
        loadContentButtonSub.on("click", function () {
            loader.addClass("active");
            overlay.show();
            $("body").css("pointer-events", "none");

            setTimeout(function () {
                loader.removeClass("active");
                overlay.hide();
                $("body").css("pointer-events", "");
            }, 2000);
        });
    });

    $(".shopnow").on("click", function () {
        window.scroll(0, 850);
    });
    // $(".activeclick").on("click", function (e) {
    //     $(this).addClass("active-menu");
    // });

    // $(document).ready(function () {
    //     // Lấy URL hiện tại
    //     var currentUrl = window.location.href;

    //     // Xóa class "active-menu" từ tất cả các thẻ <li>
    //     $(".main-menu li").removeClass("active-menu");

    //     // Kiểm tra URL và thêm class "active-menu" cho thẻ <li> tương ứng
    //     if (currentUrl == "") {
    //         $("#home-li").addClass("active-menu");
    //     } else if (currentUrl == "home/menu/Tea") {
    //         $("#tea-li").addClass("active-menu");
    //     } else if (currentUrl.indexOf("{{ route('about.get') }}") !== -1) {
    //         $("#about-li").addClass("active-menu");
    //     } else {
    //         // Nếu không có trang nào phù hợp, có thể thêm xử lý ở đây
    //     }
    // });

    ////// +/- Quantity Cartdetail ///////
})(jQuery);
