<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\menu;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailProduct extends Controller
{
    public function detailproduct($id)
    {
        $menunames = menu::all();
        $products = products::all();
        $comments = comments::where('product_id', $id)->get();
        return view('welcome', [
            'activePage' => 'detailproduct',
            'id' => $id,
            'menunames' => $menunames,
            'products' => $products,
            'comments' => $comments
        ]);
    }
    public function createcomment(Request $request, $id)
    {
        try {
            $content = $request->input('review');
            $guestname = Auth::user()->name;
            $rate = $request->input('rating');
            $productid = $id;

            comments::create([
                'name' => $guestname,
                'content' => $content,
                'rate' => $rate,
                'product_id' => $productid
            ]);

            return response()->json(['message' => 'upload comment success']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to create comment: ' . $e->getMessage()], 500);
        }
    }
    public function showcomment($id)
    {
        $comments = comments::latest()->first();
        return response()->json($comments);
    }
}
