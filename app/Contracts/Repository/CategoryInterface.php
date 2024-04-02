<?php

namespace App\Contracts\Repository;

interface CategoryInterface {
    public function index();
    public function create($data);
    public function show($object);
}
