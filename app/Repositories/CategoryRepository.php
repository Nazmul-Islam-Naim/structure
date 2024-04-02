<?php
namespace App\Repositories;
use App\Contracts\Repository\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface{
    protected $model;

    public function __construct(Category $category){
        $this->model = $category;
    }

    public function index() {
        return $this->model->all();
    }

    public function create($data){
        // dd($data);
        // return Category::create($data);
        return $this->model->create($data);
    }

    public function show($object){

    }
}
