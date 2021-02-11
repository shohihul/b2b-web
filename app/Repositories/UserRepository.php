<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use File;

class UserRepository
{
    protected $model;

	public function __construct(User $model)
	{
        $this->model = $model;
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->model->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone_number' => $request->phone_number
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }
}