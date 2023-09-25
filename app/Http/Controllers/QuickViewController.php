<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuickViewController extends Controller
{
    public function quickview($id)
    {
        $quickviewproduct = products::find($id);
        if (!$quickviewproduct) {
            return response()->json(['error' => 'Sản phẩm không tồn tại'], 404);
        }

        return response()->json($quickviewproduct);
    }
    public function cartaddquick(Request $request, $id)
    {
        $productid = $id;
        $quantity = $request->input('cartquantityquick');
        $finditem = cart::where('product_id', $productid)->first();
        $emailuser = Auth::guard('userhomes')->user()->email;
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
}
