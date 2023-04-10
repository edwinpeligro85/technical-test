<?php

namespace App\Http\Controllers;

use App\Features\StoreCategoryFeature;
use Lucid\Units\Controller;

class CategoryController extends Controller
{
    public function store()
    {
        return $this->serve(StoreCategoryFeature::class);
    }
}
