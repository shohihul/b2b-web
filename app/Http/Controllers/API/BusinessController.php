<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\BusinessRepository;

class BusinessController extends Controller
{
    public $successStatus = 200;
    private $businessRepository;

    public function __construct(BusinessRepository $businessRepository)
    {
        $this->businessRepository = $businessRepository;
    }
    
    public function store(Request $request)
    {
        $shop = $this->businessRepository->get_by_user($request->user()->id);

        if ($shop != null) {
            return response()->json(['message'=>'Anda sudah punya toko'], $this->successStatus);
        }

        $this->businessRepository->store($request);

        return response()->json(['message'=>'Berhasil Membuat Toko'], $this->successStatus);
    }
}
