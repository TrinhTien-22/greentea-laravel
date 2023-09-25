<?php

namespace App\Http\Controllers\Auth;

use App\Events\MenuDeleted;
use App\Models\menu;
use Illuminate\Http\Request;
use \App\Http\Controllers\Controller;
use Illuminate\View\View;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class Menucontroller extends Controller
{
    public function store(Request $request)
    {
        $menu = new menu();

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('imagesave'), $filename);
            $menu->image = $filename;
        }
        $menu->name = $request->input('name');
        $menu->price = $request->input('price');
        $menu->description = $request->input('description');
        $menu->active = $request->input('active');
        $menu->save();
        // dd($data->image);
        return response()->json(['success' => true, 'message' => 'Product added successfully.']);
    }
    public function showmenu()
    {
        $data = menu::all();
        return view('layouts.dashboard', [
            'activePage' => 'showmenu',
            'data' => $data

        ]);
    }

    public function create()
    {
        return view('layouts.dashboard', ['activePage' => 'add']);
    }
    public function update($id)
    {
        $menu = menu::find($id);
        return view('layouts.dashboard', [
            'menu' => $menu,
            'activePage' => 'update'
        ]);
    }
    public function updatestore(Request $request, $id)
    {

        $updateid = menu::find($id);
        // $validaterow = $request->validate([
        //     'name' => 'string',
        //     'image' => 'required|max:255',
        //     'price' => 'numeric',
        //     'description' => 'string',
        //     'active' => ''
        // ]);
        // $updateid->update($validaterow);
        $updateid->name = $request->input('name');
        $updateid->price = $request->input('price');
        $updateid->description = $request->input('description');

        if ($request->file('image_new') != "") {
            File::delete('imagesave/' . $updateid->image);
            $imagenew = $request->file('image_new');
            $imagenewname = $imagenew->getClientOriginalName();
            $imagenew->move(public_path('imagesave'), $imagenewname);
            $updateid->image = $imagenewname;
        }
        $updateid->active = ($request->input('active') == "") ? $updateid->active : $request->input('active');
        $updateid->save();
        return redirect()->route('showmenu');
    }
    public function delete($id)
    {
        $menu = menu::findOrFail($id);
        File::delete('imagesave/' . $menu->image);
        $menu->delete();
        event(new MenuDeleted($id));
        return back()->with('success', 'Xóa Thành Công !');
    }
}
