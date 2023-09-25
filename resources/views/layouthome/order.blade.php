<br><br><br><br>
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <a href="{{route('view.cartdetail',  ['user'=>Auth::guard('userhomes')->user()->email])}}" class="stext-109 cl4">
            Cart Detail
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a> 

        <span class="stext-109 cl4">
            Order   
        </span>
    </div>
</div>
<br><br><br>
<table  class="table">
    <thead class="dark-thead">
        <tr>
            <th>ID</th>
            <th>Client</th>
            <th>Items</th>
            <th>Email</th>
            <th>SĐT</th>
            <th>Total</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
            $id=1;
        @endphp
        @foreach ($theorder as $order)
        <tr>
            <td scope="row">{{$id++}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->items}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->sdt}}</td>
            <td>${{$order->total}}</td>
            <td>{{$order->created_at}}</td>
            <td>
                @if ($order->active == 'processing')
                <button class="btn btn-warning">{{$order->active}}</button>
            @elseif($order->active == 'success')
                <button class="btn btn-success"><i class="fa-solid fa-check"></i></button>
            @elseif($order->active == 'success')
                <button class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
            @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<br><br><br><br>