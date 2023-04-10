<?php

namespace App\Domains\Category\Jobs;

use App\Data\Models\Category;
use Lucid\Units\Job;

class StoreCategoryJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public array $data)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Category::create($this->data);
    }
}
