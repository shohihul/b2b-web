<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;

use App\Repositories\ShopRepository;

use App\Http\Requests\ShopStoreRequest;

class ShopController extends Controller
{
    private $shopRepository;

    public function __construct(ShopRepository $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }
    
    public function index ()
    {
        return view('pages.shop.shop-data');
    }

    public function create()
    {
        $users = User::all();

        return view('pages.shop.shop-new',
            compact(
                'users'
            )
        );
    }

    public function store(Request $request)
    {
        $this->shopRepository->store($request);

        return redirect(route('shop'));
    }
}
