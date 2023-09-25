<!-- Modal1 -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="/home/images/icons/icon-close.png" alt="CLOSE">
            </button>
            <script>
                $(document).ready(function () {
                    $(".quickviewproduct").click(function (e) {
                        e.preventDefault();
                        // var productid = $(this).data("productid"); 
                        var route = $(this).data("route"); 
                        // var url = route.replace(/\/$/, "") ; //loại bỏ dấu / cuối chuỗi (không cần thiết lắm)
                            $.ajax({
                            // url: "{{ route('quickview', ['id' => ' ']) }}" + productid, //cách 2 truyền id là một dấu cách (không được để trống )
                            url:route,
                            type: "GET",
                            success: function (response) {
                                var productImage = response.image;
                                $(".imagequickview").attr("src", '/imageproduct/'+ productImage);
                                $(".datathumb").attr("data-thumb", '/imageproduct/'+ productImage);
                                $(".imagequickviewa").attr("href" , '/imageproduct/'+ productImage);
                                $(".namequickview").text(response.name);
                                $(".pricequickview").text(response.price);
                                $(".descriptionquickview").text(response.description);
                                $(".cartquantityquick").val(1);
                                var productId = response.id;
                                var form = $('.formaddcartquick');
                                var route = '{{ route("cart.addquick", ["id" => ":id"]) }}';
                                route = route.replace(':id', productId);
                                form.attr('data-route', route);                               
                            },
                            error: function (xhr) {
                                console.log(xhr);
                            },
                        });  
                        
                    });
                    $(".formaddcartquick").submit(function (e) {
                        
                        e.preventDefault();
                        var routequick = $(this).attr("data-route");
                        $.ajax({
                            url: routequick,
                            type: "POST",
                            data: $(".formaddcartquick").serialize(),
                            success: function (response) {
                                // var currentNotifyValue = parseInt(
                                // $(".itemincart").data("notify"));
                                // $(".itemincart").data("notify", currentNotifyValue + 1);
                                // console.log("New data-notify value:", $(".itemincart").data("notify"));
                            },
                            error: function (xhr) {
                                console.log(xhr);
                            },
                        });
                    });    
                });
            </script>
                {{-- <script>
    $(document).ready(function () {
        $(".quickviewproduct").click(function (e) {
            e.preventDefault();
            var route = $(this).data("route"); // Lấy giá trị của thuộc tính data-route
            
            $.ajax({
                url: route,
                type: "GET",
                success: function (response) {
                    var productImage = response.image;
                    $(".imagequickview").attr("src", '/imageproduct/'+ productImage);
                    $(".datathumb").attr("data-thumb", '/imageproduct/'+ productImage);
                    $(".imagequickviewa").attr("href" , '/imageproduct/'+ productImage);
                    $(".namequickview").text(response.name);
                    $(".pricequickview").text(response.price);
                    $(".descriptionquickview").text(response.description);
                    $(".cartquantityquick").val(1);
                    var productId = response.id; // Lấy id của sản phẩm đầu tiên
                    var form = $('.formaddcartquick');
                    var route = '{{ route("cart.addquick", ["id" => ":id"]) }}';
                    route = route.replace(':id', productId);
                    form.attr('action', route); // Sửa thuộc tính action của form
                },
                error: function (xhr) {
                    console.log(xhr);
                },
            });
        });

        // Xử lý khi formaddcartquick được submit (Chỉ đăng ký một lần)
        $(".formaddcartquick").submit(function (e) {
            e.preventDefault();
            var routequick = $(this).attr("action"); // Lấy action từ form
            $.ajax({
                url: routequick,
                type: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    // Xử lý thành công
                },
                error: function (xhr) {
                    console.log(xhr);
                },
            });
        });
    });
</script> --}}

            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
                                <ul class="slick3-dots" role="tablist" style="">
                                    <li class="slick-active " role="presentation">
                                        <img  class="imagequickview" src="">
                                        <div class="slick3-dot-overlay"></div>
                                    </li>
                                    <li role="presentation">
                                        <img  class="imagequickview" src="">
                                        <div class="slick3-dot-overlay"></div>
                                    </li>
                                    <li role="presentation">
                                        <img  class="imagequickview" src="">
                                        <div class="slick3-dot-overlay"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3 datathumb" data-thumb="">
                                    <div class="wrap-pic-w pos-relative">
                                        <img class="imagequickview" src="" alt="IMG-PRODUCT">

                                        <a class="imagequickviewa flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3 datathumb" data-thumb="">
                                    <div class="wrap-pic-w pos-relative">
                                        <img class="imagequickview1" src="" alt="IMG-PRODUCT">

                                        <a class="imagequickviewa flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="item-slick3 datathumb" data-thumb="">
                                    <div class="wrap-pic-w pos-relative">
                                        <img class="imagequickview1" src="" alt="IMG-PRODUCT">

                                        <a class="imagequickviewa flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="">
                                            <i class="fa fa-expand"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="namequickview mtext-105 cl2 js-name-detail p-b-14">
                            
                        </h4>

                        <span class="pricequickview mtext-106 cl2">
                            
                        </span>

                        <p class="descriptionquickview stext-102 cl3 p-t-23">
                            
                        </p>
                        
                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-203 flex-c-m respon6">
                                    Size
                                </div>

                                <div class="size-204 respon6-next">
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="time">
                                            <option>Choose an option</option>
                                            <option>Size M</option>
                                            <option>Size L</option>                                          
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m subquantityquick">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product cartquantityquick" type="number" name="num-product" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m addquantityquick">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                    <form action="" data-route="" class="formaddcartquick flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                        @csrf                     
                                        <input class="mtext-104 cl3 txt-center num-product cartquantityquick dis-none" type="number" name="cartquantityquick" value="1">
                                        <button >
                                            Add to cart
                                        </button>
                                    </form>
                                    @if (!Auth::guard('userhomes')->check())
                                        <script>
                                            $('.formaddcartquick').submit(function(e){
                                                e.preventDefault();
                                                swal({
                                                        icon: 'error',
                                                        title: 'Bạn cần đăng nhập để thêm vào giỏ hàng !',
                                                        
                                                        button: 'OK',
                                                    });
                                            })
                                        </script>
                                    @endif
                                </div>
                            </div>	
                        </div>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                            <div class="flex-m bor9 p-r-10 m-r-11">
                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                    <i class="zmdi zmdi-favorite"></i>
                                </a>
                            </div>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                <i class="fa-brands fa-facebook"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                <i class="fa-brands fa-twitter"></i>
                            </a>

                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                                <i class="fa-brands fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>