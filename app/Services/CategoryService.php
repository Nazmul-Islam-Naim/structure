<?php
namespace App\Services;
use App\Contracts\Repository\CategoryInterface;
use App\Repositories\CategoryRepository;

class CategoryService {
    protected $repository;
    public function __construct(CategoryInterface $categoryInterface){
        $this->repository = $categoryInterface;
    }

    public function index() {
        return $this->repository->index();
    }

    public function create($data){
        return $this->repository->create($data);
    }

}
