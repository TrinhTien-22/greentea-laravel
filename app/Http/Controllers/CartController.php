<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartadd(Request $request, $id)
    {
        $productid = $id;
        $quantity = $request->input('cartquantity');
        $emailuser = Auth::guard('userhomes')->user()->email;
        $finditem = cart::where('product_id', $productid)->first();

        if ($finditem && $finditem->email_user == $emailuser) {
            $finditem->quantity +=  $quantity;
            $finditem->save();
        } else {
            cart::create([
                'product_id' => $productid,
                'quantity' => $quantity,
                'email_user' => $emailuser
            ]);
        }
        return response()->json();
    }
    public function cartget($user)
    {
        $cartItems = Cart::where('email_user', $user)
            ->with('product') // Eager loading sản phẩm
            ->get();

        $items = [];

        foreach ($cartItems as $cartItem) {
            // Kiểm tra xem sản phẩm có tồn tại không
            if ($cartItem->product) {
                $items[] = [
                    'id' => $cartItem->product_id,
                    'image' => $cartItem->product->image,
                    'name' => $cartItem->product->name,
                    'price' => $cartItem->product->price,
                    'quantity' => $cartItem->quantity,
                ];
            }
        }

        return response()->json($items);
    }
    public function deleteitemcart($id)
    {
        $user = Auth::guard('userhomes')->user()->email;
        $findid = cart::where('product_id', $id)->where('email_user', $user)->first();
        $findid->delete();
        return response()->json(['message' => 'xoa thanh cong']);
    }
}