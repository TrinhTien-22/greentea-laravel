@if(Session::has('success'))
    <div class="alertsuccess">
        {{ Session::get('success') }}
    </div>
@endif
<table class="table" id="product-table">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Menu Name</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Description</th>
            <th>Saleoff</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="product-list">
        
    </tbody> 
</table>
<button id="load-more" class="btn btn-primary">Xem Thêm</button>
        {{-- <script>
            var ENDPOINT = "{{ url('/dashboard/products/show') }}";
            var page = 0;
            infinteLoadMore(page);
            $(window).scroll(function () {
                if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                    page++;
                    infinteLoadMore(page);
                }
            });
            function infinteLoadMore(page) {
                $.ajax({   
                        url: ENDPOINT + "?page=" + page,
                        datatype: "html",
                        type: "get",
                        beforeSend: function () {
                            $('.auto-load').show();
                        }
                    })
                    .done(function (response) {
                        console.log(response);
                        if (response.length == 0) {
                            $('.auto-load').html("We don't have more data to display :(");
                            return;
                        }
                        
                        $('.auto-load').hide();
                        $("#data-wrapper").append(response);
                    })
                    .fail(function (jqXHR, ajaxOptions, thrownError) {
                        console.log('Server error occured');
                    });
            }
            // if (response.data.length > 0) {
                        // response.data.forEach(function(product) {
                        //     var productHtml = `
                        //         <tr>
                        //             <td scope="row">${currentPage}</td>
                        //             <td>${product.name}</td>
                        //             <td>${product.name}</td>
                        //             <td>
                        //                 <img style="width: 40px ;border-radius:10px " src="${product.image}" alt="">
                        //             </td>
                        //             <td>${product.price}</td>
                        //             <td>${product.description}</td>
                        //             <td>${product.saleoff}</td>
                        //             <td>${product.active}</td>
                        //             <td style="display:flex">
                        //                 <a href="update/${product.id}" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></a>
                        //                 <form action="delete/${product.id}" id="delete-form" method="post">
                        //                     @csrf
                        //                     @method("DELETE")
                        //                     <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        //                 </form>
                        //             </td>
                        //         </tr>`;
                        //     $('#data-wrapper').append(productHtml);
                        //     return;
                        // });
        </script> --}}
        {{-- <script>
            var ENDPOINT = "{{ route('showproduct') }}";
            var currentPage = 1;
            var isLoading = false;
            function appendProduct(product) {
                var productHtml = `
                    <tr>
                        <td scope="row">${product.id}</td>
                        <td>${product.menuName}</td>
                        <td>${product.name}</td>
                        <td>
                            <img style="width: 40px ;border-radius:10px " src="${product.image}" alt="">
                        </td>
                        <td>${product.price}</td>
                        <td>${product.description}</td>
                        <td>${product.saleoff}</td>
                        <td>${product.active}</td>
                        <td style="display:flex">
                            <a href="${product.editUrl}" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="${product.deleteUrl}" id="delete-form" method="post">
                                @csrf
                                @method("DELETE")
                                <button class=" btn btn-danger "><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>`;
                $('#product-list').append(productHtml);
            }
        
            $('#load-more').click(function() {
                if (!isLoading) {
                    isLoading = true;
                    currentPage++;
                    var url = ENDPOINT + "?page=" + currentPage;
                    $.ajax({
                        url: url,
                        type: 'GET',
                       
                        success: function(response) {
                            if (response.data.length > 0) {
                                response.data.forEach(function(product) {
                                    appendProduct(product);
                                });
                                isLoading = false;
                            } else {
                                $('#load-more').hide();
                            }
                        }
                    });
                }
            });
        </script> --}}
        <script>
            var ENDPOINT = "{{ route('showproduct') }}";
            var currentPage = 0; // Bắt đầu từ 0 để hiển thị 5 sản phẩm đầu tiên.
            var isLoading = false;
            var id = 1;
            function appendProduct(product) {
                var productHtml = `
                    <tr>
                        <td scope="row">${id}</td>
                        <td>${product.menuName}</td>
                        <td>${product.name}</td>
                        <td>
                            <img style="width: 40px ;border-radius:10px " src="${product.image}" alt="">
                        </td>
                        <td>${product.price}</td>
                        <td>${product.description}</td>
                        <td>${product.saleoff}</td>
                        <td>${product.active}</td>
                        <td style="display:flex">
                            <a href="${product.editUrl}" class="btn btn-success"><i class="fa-regular fa-pen-to-square"></i></a>
                            <form action="${product.deleteUrl}" id="delete-form" method="post">
                                @csrf
                                @method("DELETE")
                                <button class=" btn btn-danger "><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>`;
                $('#product-list').append(productHtml);
            }
        
            function loadProducts() {
                var url = ENDPOINT + "?page=" + currentPage;
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        if (response.data.length > 0) {
                            response.data.forEach(function(product) {
                                appendProduct(product);
                                id++;
                            });
                        } else {
                            $('#load-more').hide();
                        }
                    }
                });
            }
        
            // Khi trang được tải, nếu currentPage là 0, thực hiện tải sản phẩm ngay lập tức.
            $(document).ready(function() {
                if (currentPage === 0) {
                    loadProducts();
                    currentPage = 1; // Sau khi tải 5 sản phẩm đầu tiên, chuyển currentPage thành 1.
                }
            });
        
            $('#load-more').click(function() {
                if (!isLoading) {
                    isLoading = true;
                    currentPage++;
                    loadProducts();
                    isLoading = false;
                }
            });
        </script>