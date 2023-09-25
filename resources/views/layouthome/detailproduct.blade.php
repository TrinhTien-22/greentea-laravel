<br><br><br><br>
@php
    $productid = $products->find($id);
    $imageproduct = asset('/imageproduct/' .$productid->image);
    
    $filteredProductinmenu = collect($products)->where('menu_id' , $productid->menu_id)
        ->where('id' , '!=' , $productid->id)
        ->all();
    // Sử dụng reject xóa phần tử trong mảng
    // $filteredProductinmenu = collect($productinmenu)->reject(function ($product) use ($productid) { 
    // return $product->id === $productid->id;
    // })->all();
@endphp
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="#" class="stext-109 cl8 hov-cl1 trans-04">
            {{$menunames->find($productid->menu_id)->name}}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
           {{$productid->name}}
        </span>
    </div>
</div>

{{-- Detail Product --}}

<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots">
                            <ul class="slick3-dots" role="tablist" style="">
                                <li class="slick-active" role="presentation">
                                    <img src=" {{$imageproduct}}">
                                    <div class="slick3-dot-overlay"></div>
                                </li>
                                <li role="presentation">
                                    <img src=" {{$imageproduct}} ">
                                    <div class="slick3-dot-overlay"></div>
                                </li>
                                <li role="presentation">
                                    <img src=" {{$imageproduct}} ">
                                    <div class="slick3-dot-overlay"></div>
                                </li>
                                </ul>
                            </div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w">
                            <button class="arrow-slick3 prev-slick3 slick-arrow" style="">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>
                            </button>
                            <button class="arrow-slick3 next-slick3 slick-arrow" style="">
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div  class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                            <div class="slick-list draggable">
                                <div class="slick-track" style="opacity: 1; width: 1539px;">
                                    <div  class="item-slick3 slick-slide slick-current slick-active" data-thumb="{{$imageproduct}}" data-slick-index="0" aria-hidden="false" tabindex="0" role="tabpanel" id="slick-slide10" aria-describedby="slick-slide-control10" style="width: 513px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{$imageproduct}}" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{$imageproduct}}" tabindex="0">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="item-slick3 slick-slide" data-thumb="{{$imageproduct}}" data-slick-index="1" aria-hidden="true" tabindex="-1" role="tabpanel" id="slick-slide11" aria-describedby="slick-slide-control11" style="width: 513px; position: relative; left: -513px; top: 0px; z-index: 998; opacity: 0;">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{$imageproduct}}" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{$imageproduct}}" tabindex="-1">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="item-slick3 slick-slide" data-thumb="{{$imageproduct}}" data-slick-index="2" aria-hidden="true" tabindex="-1" role="tabpanel" id="slick-slide12" aria-describedby="slick-slide-control12" style="width: 513px; position: relative; left: -1026px; top: 0px; z-index: 998; opacity: 0;">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{$imageproduct}}" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{$imageproduct}}" tabindex="-1">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                            

                            
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{$productid->name}}
                    </h4>

                    <span class="mtext-106 cl2">
                        ${{$productid->price}}
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        {{$productid->description}}
                    </p>
                    
                    <!--  -->
                    <div class="p-t-33">
                        {{-- <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Size
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
                                        <option>Choose an option</option>
                                        <option>Size S</option>
                                        <option>Size M</option>
                                        <option>Size L</option>
                                        <option>Size XL</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 141.333px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-time-fw-container"><span class="select2-selection__rendered" id="select2-time-fw-container" title="Choose an option">Choose an option</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m subquantity">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product cartquantity" type="number" name="num-product" value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m addquantity">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                                <form action="" data-route="{{route('cart.add' , ['id'=>$productid->id])}}" class="formaddcart flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                    @csrf                     
                                    <input class="mtext-104 cl3 txt-center num-product cartquantity dis-none" type="number" name="cartquantity" value="1">
                                    <button >
                                        Add to cart
                                    </button>
                                </form>
                                
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
                    
        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#reviews" role="tab">Reviews (1)</a>
                    </li>
                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#description" role="tab">Description</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Additional information</a>
                    </li>

                    
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade " id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                                {{$productid->description}}
                            </p>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            volume
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            200ml
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Ingredient
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            Nước , đường trắng , Matcha , Caffe  
                                        </span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
                                        <span class="stext-102 cl3 size-205">
                                            Size
                                        </span>

                                        <span class="stext-102 cl6 size-206">
                                            M,L
                                        </span>
                                    </li>

                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade show active " id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 m-lr-15-sm" id="showcomments" >
                                    <!-- Review -->
                                    <div class="flex-w flex-t p-b-68 "  >
                                        
                                            <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                <img src="/home/images/icons/icon1.png" alt="AVATAR">
                                            </div>
    
                                            <div class="size-207">
                                                <div class="flex-w flex-sb-m p-b-17">
                                                    <span class="mtext-107 cl2 p-r-20">
                                                        Test1
                                                    </span>
    
                                                    <span class="fs-18 cl11">
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star"></i>
                                                        <i class="zmdi zmdi-star-half"></i>
                                                    </span>
                                                </div>
                                                
                                                <p class="stext-102 cl6">
                                                    Phục vụ nhiệt tình , đồ uống chất lượng!
                                                </p>
                                            </div>
                                        </div>
                                        @foreach ($comments as $comment)
                                        <div class="flex-w flex-t p-b-68 "  >
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="/home/images/icons/icon1.png" alt="AVATAR">
                                        </div>
                                        
                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
                                                <span class="mtext-107 cl2 p-r-20">
                                                    {{ $comment->name }}
                                                </span>
                                                <span class="wrap-rating fs-18 cl11 pointer">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $comment->rate)
                                                            <i class=" zmdi zmdi-star" data-rating="{{ $i }}"></i>
                                                        @else
                                                            <i class="zmdi zmdi-star-outline" data-rating="{{ $i }}"></i>
                                                        @endif
                                                    @endfor
                                                </span>
                                            </div>
                                        
                                            <p class="stext-102 cl6">
                                                {{ $comment->content }}
                                            </p>
                                        </div>
                                    </div>
                                        @endforeach
                                        
                                    </div>
                                    
                                    <!-- Add review -->
                                    <form class="w-full commentform" method="post" data-route="{{ route('createcomment' , ['id'=>$productid->id]) }}">
                                        @csrf
                                        <div class="flex-w flex-m p-t-50 p-b-23">
                                            <span class="stext-102 cl3 m-r-16">
                                                Your Rating
                                            </span>

                                            <span class="wrap-rating fs-18 cl11 pointer">
                                                <i class="item-rating pointer zmdi zmdi-star-outline" data-rating="1"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline" data-rating="2"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline" data-rating="3"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline" data-rating="4"></i>
                                                <i class="item-rating pointer zmdi zmdi-star-outline" data-rating="5"></i>
                                                <input class="dis-none" type="number" name="rating" id="rating">
                                            </span>
                                        </div>

                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">Your review</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                            </div>
                                            <input class="dis-none productidcmt" data-productidcmt="{{$productid->id}}" type="number" >
                                            
                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                            Submit
                                        </button>
                                    </form>  
                                    @if (!Auth::guard('userhomes')->check())
                                        <script>
                                            $(document).ready(function () {
                                                $('.commentform').submit(function (e) {
                                                    e.preventDefault();
                                                    
                                                    swal({
                                                        icon: 'error',
                                                        title: 'Bạn cần đăng nhập để comment !',
                                                        
                                                        button: 'OK',
                                                    });
                                                });
                                                $('.formaddcart').submit(function (e) {
                                                    e.preventDefault();
                                                    
                                                    swal({
                                                        icon: 'error',
                                                        title: 'Bạn cần đăng nhập để Add sản phẩm !',
                                                        
                                                        button: 'OK',
                                                    });
                                                });
                                            });
                                        </script>
                                        @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <span class="stext-107 cl6 p-lr-25">
            SKU: JAK-01
        </span>

        <span class="stext-107 cl6 p-lr-25">
            Categories: Jacket, Men
        </span>
    </div>
</section>
 
{{-- End Detail Product --}}

<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Related Products
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <button class="arrow-slick2 prev-slick2 slick-arrow slick-disabled" aria-disabled="true" style="">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </button>

            
            <div  class="slick2 slick-initialized slick-slider">   
                <div class="slick-list draggable">
                    <div class="slick-track " style="opacity: 1; width: 3328px; transform: translate3d(0px, 0px, 0px);">
                @foreach ($filteredProductinmenu  as $item)
                    <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15 slick-slide slick-current slick-active" tabindex="0" style="width: 300px;height:300px" data-slick-index="0" aria-hidden="false">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img  style="width:270px ; height : 200px" src="{{'/imageproduct/'.$item->image}}" alt="IMG-PRODUCT">
    
                                <a href="#" data-productid="{{$item->id}}" data-route="{{ route('quickview', ['id' => $item->id]) }}" class=" quickviewproduct block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" tabindex="0">
                                    Quick View
                                </a>
                            </div>
    
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="{{route('detailproduct',['id'=>$item->id])}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" tabindex="0">
                                        {{$item->name}}
                                    </a>
    
                                    <span class="stext-105 cl3">
                                        ${{$item->price}}
                                    </span>
                                </div>
    
                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2" tabindex="0">
                                        <img class="icon-heart1 dis-block trans-04" src="/home/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/home/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                       
            @endforeach
               
                
                </div></div></div></div>
        <button class="arrow-slick2 next-slick2 slick-arrow" aria-disabled="false" style="">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
        </button>
    </div>
    </div>
</section>
<div class="btn-back-to-top" id="myBtn" style="display: flex;">
    <span class="symbol-btn-back-to-top">
        <i class="zmdi zmdi-chevron-up"></i>
    </span>
</div>

@include('quickviewproduct')