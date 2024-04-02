<?php

namespace App\Http\Controllers;

use App\Contracts\Repository\CategoryInterface;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\CategoryResources;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $service;
    public function __construct(CategoryService $categoryService){
        $this->service = $categoryService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(56, $this->service->index());
        // return view('category.index');
        return CategoryResources::collection($this->service->index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        try {
            return new CategoryResource ($this->service->create($request->all()));
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
