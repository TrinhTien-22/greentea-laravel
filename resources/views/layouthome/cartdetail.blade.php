<br><br><br><br>
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Cart Detail
        </span>
    </div>
</div>
<div class="bg0 p-t-75 p-b-85">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table  class="table-shopping-cart">
                            <thead>
                                <tr class="table_head">
                                    <th class="column-1">Product</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Price</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Total</th>
                                </tr>
                            </thead>
                            <tbody id="htmlajax">
                            @php
                                $itemorder="";
                                $total = 0;
                            @endphp
                                @foreach ($items as $item)
                                @php
                                    $itemorder .= $item['quantity'] .'x'. $item['name']. "  ";
                                    $total += $item['quantity']*$item['price']; 
                                @endphp
                                <tr class="table_row" >
                                    
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="/imageproduct/{{$item['image']}}" alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">
                                        {{$item['name']}}
                                        <br><br>
                                        <div data-route = "{{ route('delete.itemcart', ['id' => $item['id']]) }}" class="deleteitemcartdetail delete-button">
                                            @csrf
                                            @method('POST')
                                            <button class="buttondelete"><i class="fa-solid fa-trash-can"></i></button>
                                            <span class="tooltip">Bạn muốn xóa sản phẩm</span>
                                        </div>
                                        
                                    </td>
                                    
                                    <td class="column-3">$ {{$item['price']}}</td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">

                                            <div method="post" data-route = "{{route('active.quantity' , ['id'=>$item['id'] ,'active'=>'sub'])}}" class=" cartdetailsub btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                @csrf
                                                @method('post')
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product cartdetailnum" type="number" name="num-product1" value="{{$item['quantity']}}">

                                            <div method="post" data-route = "{{route('active.quantity' , ['id'=>$item['id'],'active'=>'add'])}}" class=" cartdetailadd btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                @csrf   
                                                @method('post')             
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5">$ {{$item['quantity'] * $item['price']}}</td>
                                </tr>
                            @endforeach
                            
                        </tbody></table>
                    </div>
                    
                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Discount Code">
                                
                            <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Apply Discount
                            </div>
                        </div>

                        {{-- <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                            Update Cart
                        </div> --}}
                    </div>
                </div>
            </div>

            <form method="post" action="{{route('view.cartdetailpost' , ['user'=>Auth::guard('userhomes')->user()->email])}}" class=" formorder col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">
                                ${{$total}}
                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Shipping:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                There are no shipping methods available. 
                            </p>
                            
                            <div class="p-t-15">
                                <span class="stext-112 cl8">
                                    Calculate Shipping
                                </span>

                                {{-- <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2 select2-hidden-accessible" name="time" tabindex="-1" aria-hidden="true">
                                        <option>Select a country...</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                    </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 142.667px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-time-ef-container"><span class="select2-selection__rendered" id="select2-time-ef-container" title="Select a country...">Select a country...</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    <div class="dropDownSelect2"></div>
                                </div> --}}
                                <div style="width : 100%" class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" placeholder="" value="{{Auth::guard('userhomes')->user()->name}} " readonly >
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="sdt" placeholder="SĐT" required>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" placeholder="Email" value="{{Auth::guard('userhomes')->user()->email}} " readonly>
                                </div>
                                <input type="text" class="dis-none" name="items" value="{{$itemorder}}" id="">
                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="country" placeholder="Country" required>
                                </div>
                                
                                <div class="flex-w">
                                    <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                        Update Totals
                                    </div>
                                </div>
                                    
                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <input name="total" value="{{$total}}" class="mtext-110 cl2" readonly>
                                
                           
                        </div>
                    </div>
                    @csrf
                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Proceed to Checkout
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // $(document).on('click' , ".deleteitemcartdetail" , function(e){            
        //     var productiditem = $(this).data('id');
        //     var itemroute = "{{route('delete.itemcart' , ['id'=>':id'])}}".replace(":id" , productiditem);
        //     $(this).data('route' , itemroute);
        // });
        // $(document).on('click' , ".cartdetailsub" , function(e){            
        //     var productiditem = $(this).data('id');
        //     var itemroute = "{{route('active.quantity' , ['id'=>':id' ,'active'=>'sub'])}}".replace(":id" , productiditem);
        //     $(this).data('route' , itemroute);
        // });
        // $(document).on('click' , ".cartdetailadd" , function(e){            
        //     var productiditem = $(this).data('id');
        //     var itemroute = "{{route('active.quantity' , ['id'=>':id','active'=>'add'])}}".replace(":id" , productiditem);
        //     $(this).data('route' , itemroute);
        // });     
       
        $('.deleteitemcartdetail').on('click' , function(e){
            // e.preventDefault();
            var route = $(this).data('route');
            $.ajax({
                url:route,
                type:'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success:function(response){
                    loadproduct();
                    
                    console.log(response);
                },
                error:function(xhr){
                    console.log(xhr);
                }
            });
        });
        
        function loadproduct(){
            $.ajax({
                url: "{{route('cart.get' , ['user'=>Auth::guard('userhomes')->user()->email])}}",
                type:'GET',
                success:function(response){

                    var text = "";
                    $.each(response , function(key, item){
                        var itemroute = "{{route('delete.itemcart' , ['id'=>':id'])}}".replace(":id" , item.id);
                        var itemroute1 = "{{route('active.quantity' , ['id'=>':id' ,'active'=>'sub'])}}".replace(":id" , item.id);
                        var itemroute2 = "{{route('active.quantity' , ['id'=>':id' ,'active'=>'add'])}}".replace(":id" , item.id);
                        text += `
                        <tr class="table_row" >
                            <td class="column-1">
                                <div class="how-itemcart1">
                                    <img src="/imageproduct/${item.image}" alt="IMG">
                                </div>
                            </td>
                            <td class="column-2">
                                ${item.name}
                                <br><br>
                                <div data-id="${item.id}" data-route = "${itemroute}" class="deleteitemcartdetail delete-button">
                                    @csrf
                                    @method('POST')
                                    <button class="buttondelete"><i class="fa-solid fa-trash-can"></i></button>
                                    <span class="tooltip">Bạn muốn xóa sản phẩm</span>
                                </div>
                                
                            </td>
                            
                            <td class="column-3">$ ${item.price}</td>
                            <td class="column-4">
                                <div class="wrap-num-product flex-w m-l-auto m-r-0">

                                    <div method="post" data-id="${item.id}" data-route = "${itemroute1}" class=" cartdetailsub btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        @csrf
                                        @method('post')
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product cartdetailnum" type="number" name="num-product1" value="${item.quantity}">

                                    <div method="post" data-id="${item.id}" data-route = "${itemroute2}" class=" cartdetailadd btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        @csrf   
                                        @method('post')             
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="column-5">$ ${item.quantity * item.price}</td>
                        </tr>
                        `;
                        
                    });
                    $('#htmlajax').html(text);     
                    $('.deleteitemcartdetail').on('click' , function(e){
                        e.preventDefault();
                        var route = $(this).data('route');
                        $.ajax({
                            url:route,
                            type:'DELETE',
                            data: {_token: '{{ csrf_token() }}'},
                            success:function(response){
                                loadproduct();
                                
                                console.log(response);
                            },
                            error:function(xhr){
                                console.log(xhr);
                            }
                        });
                    });
                    $(".cartdetailadd").on("click", function (e) {
                        var route = $(this).data("route");
                        $.ajax({
                            url: route,
                            type: "POST",
                            data: { _token: "{{ csrf_token() }}" },
                            success: function (response) {
                                console.log(response);
                            },
                            error: function (xhr) {
                                console.log(xhr);
                            },
                        });
                    });
                    $(".cartdetailsub").on("click", function (e) {
                        var route = $(this).data("route");
                        $.ajax({
                            url: route,
                            type: "POST",
                            data: { _token: "{{ csrf_token() }}" },
                            success: function (response) {
                                console.log(response);
                            },
                            error: function (xhr) {
                                console.log(xhr);
                            },
                        });
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
                loadanimation();
                },
                
                error:function(xhr){
                    console.log(xhr);
                }
            });    
                
        };
        $(".cartdetailadd").on("click", function (e) {
            var route = $(this).data("route");
            $.ajax({
                url: route,
                type: "POST",
                data: { _token: "{{ csrf_token() }}" },
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr) {
                    console.log(xhr);
                },
            });
        });
        $(".cartdetailsub").on("click", function (e) {
            var route = $(this).data("route");
            $.ajax({
                url: route,
                type: "POST",
                data: { _token: "{{ csrf_token() }}" },
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr) {
                    console.log(xhr);
                },
            });
        });
        $('.formorder').submit(function(e){
            e.preventDefault();
            var route = $(this).attr('action');
            $.ajax({
                url: route , 
                type : 'POST',
                data : $('.formorder').serialize(),
                success:function(response){
                    window.location.href = "{{route('order' , ['user'=>Auth::guard('userhomes')->user()->email])}}";
                    console.log(response);
                },
                error:function(xhr){
                    console.log(xhr);
                }
            });
        });
        function loadanimation(){
            const loader = $("#loader");
        const loadContentButtonAdd = $(".cartdetailadd");
        const loadContentButtonSub = $(".cartdetailsub");
        const overlay = $("#overlay");

        loadContentButtonAdd.on("click", function () {
            loader.addClass("active");
            overlay.show();
            $("body").css("pointer-events", "none"); // Vô hiệu hóa tương tác với toàn bộ trang

            // Simulate loading process (you can replace this with your actual loading logic)
            setTimeout(function () {
                loader.removeClass("active");
                overlay.hide();
                $("body").css("pointer-events", ""); // Kích hoạt lại tương tác với toàn bộ trang
            }, 2000); // Thay đổi 3000 thành thời gian tải thực tế (milliseconds)
        });
        loadContentButtonSub.on("click", function () {
            loader.addClass("active");
            overlay.show();
            $("body").css("pointer-events", "none"); // Vô hiệu hóa tương tác với toàn bộ trang

            // Simulate loading process (you can replace this with your actual loading logic)
            setTimeout(function () {
                loader.removeClass("active");
                overlay.hide();
                $("body").css("pointer-events", ""); // Kích hoạt lại tương tác với toàn bộ trang
            }, 2000); // Thay đổi 3000 thành thời gian tải thực tế (milliseconds)
        });
        }
    });
</script>
{{-- // var itemroute = "{{route('delete.itemcart' , ['id'=>':id'])}}".replace(":id" , item.id);
                        // $('.deleteitemcartdetail').data('route' , itemroute);
                        // var itemroute1 = "{{route('active.quantity' , ['id'=>':id' ,'active'=>'sub'])}}".replace(":id" , item.id);
                        // $('.cartdetailsub').data('route' , itemroute1);
                        // var itemroute2 = "{{route('active.quantity' , ['id'=>':id','active'=>'add'])}}".replace(":id" , item.id);
                        // $('.cartdetailadd').data('route' , itemroute2); --}}