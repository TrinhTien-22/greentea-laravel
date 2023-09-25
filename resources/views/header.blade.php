<!-- Header -->

<header>
    
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
                <div class="right-top-bar flex-w h-full">
                    @if (Route::has('homelogin'))
                        @auth('userhomes')       
                            <a href="#" style="color: rgb(252, 249, 249)" class="flex-c-m trans-04 p-lr-25 hoverusername username">
                                {{Auth('userhomes')->user()->name}}                                
                            </a>  
                            <a href="#" style="color: rgb(252, 249, 249)"  id="changePassword" class="flex-c-m trans-04 p-lr-25 hoverusername changepassword">
                                Change Password
                            </a>   
                            <form action="" id="logoutform" method="post"  class="flex-c-m trans-04 p-lr-25 hoverusername">
                                @csrf
                                <button style="color: rgb(252, 249, 249)" >LogOut</button>
                            </form>
                         @else
                        <a href="#" class="flex-c-m trans-04 p-lr-25 js-show-login-modal">
                            Login
                        </a>
                        <a href="#" class="flex-c-m trans-04 p-lr-25 js-show-register-modal">
                            Register
                        </a>
                        @endauth 
                    @endif
                </div>
            </div>
        </div>
        <div class="login-modal wrap-modal1 js-login-modal p-t-60 p-b-20">
            <!-- Modal content -->
            <div class="modal-content">
                <!-- Close button -->
                <span class="close js-hide-login-modal">&times;</span>
        
                <!-- Login Form -->
                <div class="modal-body ">
                    <h2 class="text-center">Login</h2>
                    <div class="errorlogin">
                    </div>
                    <form id="loginForm">
                        @csrf
                        <div class="form-group">
                          <label for="">Email</label>
                          <input type="text" id="email" name="email" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password"  id="password" name="password" required class="form-control" placeholder="" aria-describedby="helpId">
                          </div>
                        <div class="text-center">
                            <button class=" btn btn-success " type="submit">Login</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="login-modal wrap-modal1 js-register-modal p-t-60 p-b-20">
            <!-- Modal content -->
            <div class="modal-content">
                <!-- Close button -->
                <span class="close js-hide-register-modal">&times;</span>
        
                <!-- Login Form -->
                <div class="modal-body">
                    <h2>Register</h2>
                    <form id="registerForm" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="">User name</label>
                          <input type="text" id="usernameresgister" name="registername" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text"  id="emailresgister" name="registeremail" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password"  id="passwordresgister" name="registerpassword" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="text-center">
                            <button class=" btn btn-success " type="submit">Register</button>
                        </div>
                    </form>
                    {{-- <form id="registerForm" method="post">
                        @csrf
                        <label >Username:</label>
                        <input type="text" id="usernameresgister" name="registername" required>
                        <br>
                        <label >Email:</label>
                        <input type="text" id="emailresgister" name="registeremail" required>
                        <br>
                        <label >Password:</label>
                        <input type="password" id="passwordresgister" name="registerpassword" required>
                        <br>
                        <button class="btn btn-success" type="submit">Register</button>
                    </form> --}}
                </div>
            </div>
        </div>
        <div class="login-modal wrap-modal1 js-changepassword-modal p-t-60 p-b-20">
            <!-- Modal content -->
            <div class="modal-content">
                <!-- Close button -->
                <span class="close js-hide-changepassword-modal">&times;</span>
        
                <!-- Login Form -->
                <div class="modal-body">
                    <h2>Change Password</h2>
                    <form id="changepassword" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="">Password</label>
                          <input type="text" name="changepassword" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password"  name="changenewpassword" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="">Retype Password</label>
                            <input type="password"  name="nhaplaipassword" required class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="text-center">
                            <button class=" btn btn-success " type="submit">Change</button>
                        </div>
                    </form>
                    {{-- <form id="changepassword" method="post">
                        @csrf
                        <label >Password</label>
                        <input type="text"  name="changepassword" required>
                        <br>
                        <label >New Password</label>
                        <input type="text"  name="changenewpassword" required>
                        <br>
                        <label >Nhập lại Password</label>
                        <input type="password" name="nhaplaipassword" required>
                        <br>
                        <button class="btn btn-success" type="submit">Change</button>
                    </form> --}}
                </div>
            </div>
        </div>
        
        <script>
        
            $(document).ready(function () {
                
                $('#registerForm').submit(function (e) {
                    e.preventDefault();
        
                    $.ajax({
                        url: "{{route('homeregister')}}",
                        type: "POST",
                        data: $(this).serialize(),
                        success: function (response) {
                           $('.js-register-modal').removeClass('show-modal1');
                           swal({
                                icon: 'success',
                                title: 'Đăng kí thành công !',
                                
                                button: 'OK',
                            });
                        },
                        error: function (xhr) {
                            // Xử lý lỗi
                            var errors = xhr.responseJSON;
                            console.log(errors);
                        }
                    });
                });
                
                $('#loginForm').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        url: "{{ route('homelogin') }}",
                        type: "POST",
                        data: $(this).serialize(),
                        success: function(response){
                            console.log(response.message);
                            if (response.message === 'success') {
                                
                                // Đăng nhập thành công, redirect đến trang home
                                window.location.href = "{{ route('home') }}";
                            } else {
                                // Đăng nhập không thành công, hiển thị thông báo lỗi
                                let errorText = '<p style="text-align :center ; color :red">Tài khoản hoặc mật khẩu sai !</p>';
                                $('.errorlogin').html(errorText);
                            }
                        },
                        
                        error: function(xhr){
                            var errors = xhr.responseJSON;
                            console.log(errors);
                        }
                    });
                });


                
                $('#logoutform').submit(function (e) {
                    e.preventDefault();      
                    $.ajax({
                        url: "{{route('homelogout')}}",
                        type: "POST",
                        data: $(this).serialize(),
                        success: function (response) {
                           window.location.href = "{{route('home')}}";
                        },
                        error: function (xhr) {
                            // Xử lý lỗi
                            var errors = xhr.responseJSON;
                            console.log(errors);
                        }
                    });
                });    
                   
            });
            $('#changepassword').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{route('changepassword')}}",
                    type: "POST",
                    data: $(this).serialize(),
                    success:function(response){
                        $('.js-changepassword-modal').removeClass('show-modal1');
                        swal({
                                icon: 'success',
                                title: 'Đổi mật khẩu thành công !',
                                
                                button: 'OK',
                            });
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON;
                        console.log(errors);
                    }
                });
            });
        </script>





        <div class="wrap-menu-desktop">
            <div id="loader" class="loader"></div>
            <nav class="limiter-menu-desktop container">
                
                <!-- Logo desktop -->		
                <a href="{{route('home')}}" class="logo">
                    <img src="{{asset('homeimage/logo/logo.jpg')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li id="home-li"  class=" activeclick">
                            <a href="{{route('home')}}">Home</a>
                            
                        </li>

                        @foreach ($menunames as $menuname)
                            @if ($menuname->name=='Tea')
                                
                                <li id="tea-li" class=" activeclick label1" data-label1="hot" >
                                    <a href="{{route('menu.handle' , ['name'=>$menuname->name])}}">{{$menuname->name}}</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">Matcha</a></li>
                                        <li><a href="#">Trà Sen</a></li>
                                        <li><a href="#">Ô Long</a></li>
                                    </ul>
                                </li>
                            @else                           
                                <li class=" activeclick">
                                    <a href="{{route('menu.handle' , ['name'=>$menuname->name])}}">{{$menuname->name}}</a>
                                </li>
                            @endif
                        @endforeach
                        
                        <li  class=" activeclick">
                            <a href="{{route('about.get')}}">About</a>
                        </li>

                        <li class="activeclick">
                            <a href="{{route('contact.get')}}">Contact</a>
                        </li>
                    </ul>
                </div>	

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart itemincart"  data-notify="!">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>
                </div>
            </nav>
        </div>	
    </div>
    
    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->		
        <div class="logo-mobile">
            <a href="{{route('home')}}"><img src="{{asset('homeimage/logo/logo.jpg')}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"  data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    @if (Route::has('homelogin'))
                        @auth('userhomes')       
                            <a href="#" style="color: rgb(252, 249, 249)" class="flex-c-m trans-04 p-lr-25 hoverusername username">
                                {{Auth('userhomes')->user()->name}}                                
                            </a>  
                            <a href="#" style="color: rgb(252, 249, 249)"  id="changePassword" class="flex-c-m trans-04 p-lr-25 hoverusername changepassword">
                                Change Password
                            </a>   
                            <form action="" id="logoutform" method="post"  class="flex-c-m trans-04 p-lr-25 hoverusername">
                                @csrf
                                <button style="color: rgb(252, 249, 249)" >LogOut</button>
                            </form>
                            @else
                        <a href="#" class="flex-c-m trans-04 p-lr-25 js-show-login-modal">
                            Login
                        </a>
                        <a href="#" class="flex-c-m trans-04 p-lr-25 js-show-register-modal">
                            Register
                        </a>
                        @endauth 
                    @endif
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="{{route('home')}}">Home</a>
                <span class="arrow-main-menu-m">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </span>
            </li>
            @foreach ($menunames as $menuname)
                <li>
                    <a href="{{route('menu.handle' , ['name'=>$menuname->name])}}">{{$menuname->name}}</a>
                </li>
            @endforeach
            
            <li>
                <a href="{{route('about.get')}}">About</a>
            </li>

            <li>
                <a href="{{route('contact.get')}}">Contact</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    {{-- <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="home/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div> --}}
    
</header>

{{-- HANDLE SEAR --}}
<div class="wrap-header-cart modal-search-header">
    <div class="s-full js-hide-modal-search"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Search !!!
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-modal-search">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        <form class="wrap-search-header searchForm flex-w p-l-15">
            @csrf
            <button class="flex-c-m trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>
            <input class="plh3" type="text" id="search" name="search" placeholder="Search...">
        </form>
        <script>
            $(document).ready(function(e){
                $('.searchForm').keyup(function(e){
                    e.preventDefault();
                    var searchname = $('#search').val();
                    if(searchname.length >= 3){
                        $.ajax({
                            url: "{{route('searchproduct')}}",
                            type: "GET",
                            data  :{searchname: searchname},
                            success: function(response){
                                var result ='';
                                var baseUrl = "{{ route('home') }}/home/detailproduct/";
                                 // Lấy URL của route
                                $.each(response , function(key , product){
                                    var productUrl = baseUrl + product.id;
                                    result += `
                                    <li class="header-cart-item flex-w flex-t m-b-12">
                                        <a href="${productUrl}" class="header-cart-item-img">
                                            <img src="{{asset('imageproduct/${product.image}')}}" alt="IMG">      
                                        </a>
                                        <div class="header-cart-item-txt p-t-8">
                                            <a href="${productUrl}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                                ${product.name}
                                            </a>

                                            <span class="header-cart-item-info">
                                                $${product.price}
                                            </span>
                                        </div>
                                        </li>
                                    `;                                   
                                });
                                $('.resultsearch').html(result);
                            },
                            error: function (xhr) {
                                console.log(xhr);
                            }
                        });
                    }
                    else {
                        $('.resultsearch').html(''); // Xóa kết quả hiển thị nếu người dùng nhập ít hơn 3 ký tự
                         }
                 });               
            });
        </script>
        <br>
        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full resultsearch">
                
            </ul>
            
            {{-- <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: $75.00
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div> --}}
        </div>
    </div>
</div>

{{-- END HANDLE SEARCH --}}

<!-- Cart -->
@if (Auth::guard('userhomes')->check())
<script>
    $('.js-show-cart').attr('data-route' , '{{route('cart.get' , ['user'=>Auth::guard('userhomes')->user()->email])}}')
</script>
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        
        <div class="header-cart-content flex-w js-pscroll">
            <ul  class="header-cart-wrapitem w-full resultcart">
                
            </ul>
            
            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: $75.00
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="{{route('view.cartdetail' , ['user'=>Auth::guard('userhomes')->user()->email])}}" class=" hreflocation flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="{{route('view.cartdetail',['user'=>Auth::guard('userhomes')->user()->email])}}" class=" flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        
        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-txt p-t-8">
                        <p class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            Chưa có sản phẩm nào 
                        </p>
                    </div>
                </li>

                

                
            </ul>
            
            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: $0.00
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="#" class=" viewcartdetail flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="#" class=" viewcartdetail flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
                <script>
                    $('.viewcartdetail').click(function(e){
                        e.preventDefault();
                        swal({
                            icon: 'error',
                            title : "Vui lòng đăng nhập !",
                            button : 'OK'
                        });
                    })
                </script>
            </div>
        </div>
    </div>
</div>
@endif
<script>
    $(document).ready(function () {
        var route = $(".js-show-cart").data("route");
        var currentRoute = "{{route('home')}}" + window.location.pathname;
        var hreflocation = $('.hreflocation').attr('href');
        
        $(".js-show-cart").on("click", function () {
            if(currentRoute == hreflocation){
                location.reload();
            }else{
                $(".js-panel-cart").addClass("show-header-cart");
                loadcart();
            }
        });
        function loadcart(){
            $.ajax({
                url: route,
                type: "GET",
                success: function (response) {
                    var result = "";
                    // Lấy URL của route
                    $.each(response, function (key, product) {
                        result += `
                        <li  class="header-cart-item flex-w flex-t m-b-12">
                            <div class="header-cart-item-img">
                                <img src="/imageproduct/${product.image}" alt="IMG">
                            </div>

                            <div style="width : 45%" class="header-cart-item-txt p-t-8">
                                <a href="" data-id="${product.id}" class=" nameitemincart header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    ${product.name}
                                </a>

                                <span class="header-cart-item-info">
                                    ${product.quantity} x $${product.price}
                                </span>
                            </div>
                            <br>
                            <form class="deleteitemcart delete-button" data-id="${product.id}" action="" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger "><i class="fa-solid fa-circle-minus"></i></button>
                                <span class="tooltip">Xóa sản phẩm </span>
                            </form>

                            </li>
                        `;
                    });
                    $(".resultcart").html(result);
                },
                error: function (xhr) {
                    console.log(xhr);
                },
            });
        }
        // $('.deleteitemcart').each(function (e) {
        //     var form = $(this);
        //     var productid = form.data("id");
        //     var action = "{{ route('delete.itemcart', ['id' => ':id']) }}".replace(':id', productid);
        //     form.attr('action', action);
            
        //     form.submit(function(e) {
        //         e.preventDefault(); // Ngăn form gửi đi một yêu cầu thường

        //         var url = form.attr('action');

        //         $.ajax({
        //             url: url,
        //             type: 'DELETE',
        //             data: {_token: '{{ csrf_token() }}'},
        //             success: function(response){
        //                 swal({
        //                     icon: 'success',
        //                     title: 'Xóa Thành Công !',
        //                     button: 'OK',
        //                 });
        //                 loadcart();
        //             },
        //             error: function(xhr){
        //                 console.log(xhr);
        //             }
        //         });
        //     });
        // });
        $(document).on('click' , ".nameitemincart" , function(e){
            
            var productiditem = $(this).data('id');
            var itemhref = "{{route('detailproduct' , ['id'=>':id'])}}".replace(":id" , productiditem);
            $(this).attr('href' , itemhref);
        });
        $(document).on("submit", ".deleteitemcart", function (e) {
        e.preventDefault();
        var form = $(this);
        var productid = form.data("id");
        var url = "{{ route('delete.itemcart', ['id' => ':id']) }}".replace(":id", productid);

        $.ajax({
            url: url,
            type: "DELETE",
            data: {_token: '{{ csrf_token() }}'},
            success: function (response) {
                swal({
                    icon: "success",
                    title: "Xóa Thành Công!",
                    button: "OK",
                });
                loadcart();

                // Thực hiện bất kỳ hành động cập nhật giao diện nào ở đây
            },
            error: function (xhr) {
                console.log(xhr);
            },
        });
        });
    });
</script>
{{-- Handle Cart --}}
