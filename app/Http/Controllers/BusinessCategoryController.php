<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BusinessCategoryStoreRequest;
use App\Repositories\BusinessCategoryRepository;
use App\Models\BusinessCategory;

class BusinessCategoryController extends Controller
{
    private $businessCategoryRepository;

    public function __construct(BusinessCategoryRepository $businessCategoryRepository)
    {
        $this->businessCategoryRepository = $businessCategoryRepository;
    }

    public function index ()
    {
        return view('pages.business-category.business-category-data', [
            'business_category' => BusinessCategory::class
        ]);
    }

    public function create()
    {
        return view('pages.business-category.business-category-new');
    }

    public function store(BusinessCategoryStoreRequest $request)
    {

        $image = $request->file('image');
        $fileName = 'businessCategory-' . $request->get('name') . '.' . $image->getClientOriginalExtension();

        $this->businessCategoryRepository->store($request, $fileName);
        $this->businessCategoryRepository->fileUpload($image, $fileName);

        return redirect(route('business-category'));
    }
}
