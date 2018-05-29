<?php

namespace App\Http\Controllers;

use Itm\Session\CookieSession as Cookie;
use Meat\Repositories\PromotionRepository;

class PromotionController extends Controller
{
    public function showPromotions(PromotionRepository $repository, Cookie $cookie)
    {
        if (! $cookie->has('city')) {
            return redirect('?menu=bienvenido');
        }

        $products = $repository->findByCity($cookie->get('city'));

        return view('promotions.show', compact('products'));
    }
}
