<?php

namespace App\Repositories\Category;
use App\Http\Requests\Request;
use App\Repositories\Base\RepositoryInterface;

interface CategoryInterface
{
    public function getCategory();
    public function getCategories();
}