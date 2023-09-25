<?php

namespace App\Http\Controllers\Auth;

use \App\Http\Controllers\Controller;
use App\Models\menu;
use App\Models\products;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function quantitydashboard()
    {
        $quantitymenu = menu::count();
        $quantityproduct = products::count();
        return view('layouts/dashboard', [
            'activePage' => 'contentdashboard',
            'quantityproduct' => $quantityproduct,
            'quantitymenu' => $quantitymenu
        ]);
    }
}
