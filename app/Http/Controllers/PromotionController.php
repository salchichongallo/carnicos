<?php

namespace App\Http\Controllers;

use Itm\Session\Session;
use App\Database\Seeds\DatabaseSeeder;

class PromotionController extends Controller
{
    public function showPromotions(DatabaseSeeder $databaseSeeder, Session $session)
    {
        // TODO: Use repository.
        $promotions = [];

        return view('promotions', compact('promotions'));
    }
}
