<br><br><br><br>
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>


        <span class="stext-109 cl4">
           {{$name}}
        </span>
    </div>
</div>
<br>
<section class="bg0 p-t-23 p-b-140">
<div class="container">
<div class="productshow row isotope-grid">
@foreach ($products as $product)
<div style="flex: 0 1 calc(33.33% - 20px);" class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
    <!-- Block2 -->
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img style="width:270px ; height : 200px" src="/imageproduct/{{$product->image}}" alt="IMG-PRODUCT">

            <a href="#" data-productid="{{$product->id}}" data-route="{{ route('quickview', ['id' => $product->id]) }}" class="quickviewproduct block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                Quick View
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l ">
                <a href="{{route('detailproduct' , ['id' => $product->id])}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    {{$product->name}}
                </a>

                <span class="stext-105 cl3">
                    ${{$product->price}}
                </span>
            </div>

            <div class="block2-txt-child2 flex-r p-t-3">
                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                    <img class="icon-heart1 dis-block trans-04" src="/home/images/icons/icon-heart-01.png" alt="ICON">
                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/home/images/icons/icon-heart-02.png" alt="ICON">
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
</div>
<div class="flex-c-m flex-w w-full p-t-45">
    <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
        Load More
    </a>
</div>
</section>