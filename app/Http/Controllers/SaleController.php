<?php

namespace App\Http\Controllers;

use Itm\Http\Request;

class SaleController extends Controller
{
    public function showNewSaleForm()
    {
        return view('sales.register');
    }

    public function registerSale(Request $request)
    {
        return $request->toJson();
    }
}
