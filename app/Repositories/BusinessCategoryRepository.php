<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessCategory;

class BusinessCategoryRepository
{
    protected $model;

	public function __construct(BusinessCategory $model)
	{
	    $this->model = $model;
    }

    public function getServiceCategory()
    {
        return $this->model->where('type', 'service')->get();
    }

    public function getGoodsCategory()
    {
        return $this->model->where('type', 'goods')->get();
    }

    public function store(Request $request, $fileName)
    {
        DB::beginTransaction();

        try {
            $this->model->create([
                'name' => $request->get('name'),
                'type' => $request->get('type'),
                'image' => $fileName
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e);
        }
    }

    public function fileUpload($image, $fileName)
    {
        $image->move(public_path('assets/img/business-category'), $fileName);
    }
}