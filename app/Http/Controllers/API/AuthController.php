<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Repositories\UserRepository;
use App\Repositories\BusinessRepository;

class AuthController extends Controller
{
    public $successStatus = 200;
    private $userRepository;
    private $businessRepository;

    public function __construct(UserRepository $userRepository, BusinessRepository $businessRepository)
    {
        $this->userRepository = $userRepository;
        $this->businessRepository = $businessRepository;
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'	=> 'required',
            'password' => 'required'
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'email' => ['The provided credentials are incorrect.'],
            ], 404);
        }

        $business = $this->businessRepository->get_by_user($user->id);

        $data['token'] = $user->createToken('my-token')->plainTextToken;
        $data['name'] = $user->name;
        if($business != null) {
            $data['shop_id'] = $business->id;
        }
        
        return $data;
    }

    public function register(Request $request)
    {
        $fileName = null;
        $this->userRepository->store($request, $fileName);

        return response([
            'message'=>'Register berhasil! Silahkan lakukan Login'
        ], $this->successStatus);
    }
}
