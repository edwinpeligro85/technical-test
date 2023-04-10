<?php

namespace App\Features;

use App\Domains\Category\Jobs\StoreCategoryJob;
use App\Domains\Category\Requests\StoreCategoryRequest;
use Lucid\Units\Feature;

class StoreCategoryFeature extends Feature
{
    public function handle(StoreCategoryRequest $request)
    {
        return $this->run(new StoreCategoryJob($request->validated()));
    }
}
