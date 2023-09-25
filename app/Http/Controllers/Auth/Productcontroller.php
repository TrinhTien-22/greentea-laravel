<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\menu;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class Productcontroller extends Controller
{
    public function showproduct(Request $request)
    {

        $products = products::paginate(5);
        $test = [];
        $id = 1;
        if ($request->ajax()) {

            foreach ($products as $product) {
                $test[] = [
                    'id' =>  $id,
                    'menuName' => $product->menu->name,
                    'name' => $product->name,
                    'image' => asset("imageproduct/{$product->image}"),
                    'price' => $product->price,
                    'description' => $product->description,
                    'saleoff' => $product->saleoff,
                    'active' => $product->active,
                    'editUrl' => route('updateproduct', ['id' => $product->id]),
                    'deleteUrl' => route('deleteproduct', ['id' => $product->id]),
                ];
                $id++;
            }
            return response()->json(['data' => $test]);
        }
        return view('layouts/dashboard', [
            'activePage' => 'showproduct',
        ]);
    }
    public function showupdate($id)
    {
        $product = products::find($id);
        $menus = menu::all();
        $menurow = $product->menu; // Sử dụng mối quan hệ đã định nghĩa trong Model
        $menuname = $menurow ? $menurow->name : '';
        return view('layouts/dashboard', [
            'activePage' => 'showupdate',
            'product' => $product,
            'menunamerow' => $menuname,
            'menus' => $menus
        ]);
    }
    public function showadd()
    {
        $menunames = menu::pluck('name');
        return view(
            'layouts/dashboard',
            [
                'activePage' => 'showadd',
                'menunames' => $menunames
            ]
        );
    }

    public function addproduct(Request $request)
    {
        $product = new products();
        $menuname = $request->input('menuname');
        $menuid = menu::where('name', $menuname)->first();
        $product->menu_id = $menuid->id;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        $product->saleoff = $request->input('saleoff');
        $product->active = $request->input('active');

        if ($request->file('image')) {
            $file_tmp = $request->file('image');
            $filename = $file_tmp->getClientOriginalName();
            $file_tmp->move(public_path('imageproduct'), $filename);
            $product->image = $filename;
        }
        // if ($request->file('image')) {
        //     $file = $request->file('image');
        //     $filename = $file->getClientOriginalName();
        //     $file->move(public_path('imageproduct'), $filename);
        //     $product->image = $filename;
        // }
        $product->save();
        return redirect()->route('showproduct');
    }
    public function updateproduct(Request $request, $id)
    {

        $product = products::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        $product->saleoff = $request->input('saleoff');

        if ($request->file('image') != "") {
            File::delete('imageproduct/' . $product->image);
            $fileimg = $request->file('image');
            $file_tmp = $fileimg->getClientOriginalName();
            $fileimg->move(public_path('imageproduct'), $file_tmp);
            $product->image = $file_tmp;
        }
        $product->menu_id = ($request->input('menuname') == "") ? $product->menu_id : $request->input('menuname');
        $product->active = ($request->input('active') == "") ? $product->active : $request->input('active');
        $product->save();
        return redirect()->route('showproduct');
    }
    public function deleteproduct($id)
    {
        $product = products::findOrFail($id);
        File::delete('imageproduct/' . $product->image);
        $product->delete();
        return back()->with('success', 'Xoá Thành Công !');
    }
}
