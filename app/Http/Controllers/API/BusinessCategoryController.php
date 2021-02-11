<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\BusinessCategoryRepository;

class BusinessCategoryController extends Controller
{
    private $businessCategoryRepository;

    public function __construct(BusinessCategoryRepository $businessCategoryRepository)
    {
        $this->businessCategoryRepository = $businessCategoryRepository;
    }

    public function getServiceCategory()
    {
        $service = $this->businessCategoryRepository->getServiceCategory();

        return $service;
    }

    public function getGoodsCategory()
    {
        $goods = $this->businessCategoryRepository->getGoodsCategory();

        return $goods;
    }
}
