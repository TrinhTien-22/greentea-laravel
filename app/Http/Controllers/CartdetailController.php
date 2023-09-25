<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\menu;
use App\Models\order;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartdetailController extends Controller
{
    public function viewcartdetail($user)
    {
        $menunames = menu::all();
        $cartitems = cart::where('email_user', $user)->with('product')->get();
        // dd($cartitems[0]->userhome);
        $items = $cartitems->map(function ($cartitem) {
            return [
                'id' => $cartitem->product_id,
                'image' => $cartitem->product->image,
                'name' => $cartitem->product->name,
                'price' => $cartitem->product->price,
                'quantity' => $cartitem->quantity,
            ];
        });
        return view('welcome', [
            'activePage' => 'cartdetail',
            'menunames' => $menunames,
            'items' => $items,
        ]);
    }
    public function activequantity($id, $active)
    {
        $user = Auth::guard('userhomes')->user()->email;
        $findid = cart::where('product_id', $id)->where('email_user', $user)->first();
        if ($active == 'sub') {
            $findid->quantity = $findid->quantity - 1;
        } else {
            $findid->quantity = $findid->quantity + 1;
        }
        $findid->save();
        return response()->json($findid);
    }
    public function theorder(Request $request, $user)
    {
        try {
            $name = $request->input('name');
            $sdt = $request->input('sdt');
            $email = $request->input('email');
            $country = $request->input('country');
            $items = $request->input('items');
            $total = $request->input('total');

            // Kiểm tra trước nếu email đã tồn tại trong bảng order
            order::create([
                'name' => $name,
                'email' => $email,
                'sdt' => $sdt,
                'items' => $items,
                'country' => $country,
                'total' => $total,
                'active' => 'processing'
            ]);

            return response()->json(['message' => 'Tạo đơn thành công']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Đã xảy ra lỗi: ' . $e->getMessage()], 500);
        }
    }

    public function order($user)
    {
        $theorder = order::where('email', $user)->get();
        $menunames = menu::all();
        return view('welcome', [
            'activePage' => 'order',
            'menunames' => $menunames,
            'theorder' => $theorder
        ]);
    }
}
