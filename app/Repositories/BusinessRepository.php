<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Business;

class BusinessRepository
{
    public function __construct(Business $model)
	{
	    $this->model = $model;
    }

    public function get_by_user($owner_id)
    {
        return $this->model->where('owner_id', $owner_id)->first();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->model->create([
                'name' => $request->name,
                'company_name' => $request->company_name,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'coordinate_location' => $request->coordinate_location,
                'address' => $request->address,
                'npwp' => $request->npwp,
                'balance' => $request->balance,
                'owner_id' => $request->user()->id,
                'manager_id' => $request->manager_id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }
}