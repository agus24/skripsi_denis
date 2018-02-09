<?php

namespace App\Front;

use App\Produk;
use App\Repo\ProdukRepo;
use App\UserCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ViewComposer
{
    protected $cart = [];

    public function __construct()
    {
        $this->setCart();
    }

    public function compose(View $view)
    {
        $search = $_GET['search'] ?? "";
        $filter = $_GET['filter'] ?? "";
        $view->with('products', $this->getProduct($search, $filter));
        $view->with('cart', $this->cart);
    }

    private function getProduct($search, $filter)
    {
        return ProdukRepo::getAll(new Produk, $search, $filter);
    }

    private function setCart()
    {
        if(!Auth::guard('customer')->guest())
        {
            $user = Auth::guard('customer')->user()->id;
            $this->cart = (new UserCart)->getByUser($user);
        }
        else {
            $this->cart = collect([]);
        }
    }
}
