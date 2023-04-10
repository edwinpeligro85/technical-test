<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Fureev\Trees\NestedSetTrait;
use Fureev\Trees\Config\Base;
use Fureev\Trees\Config\TreeAttribute;

class Category extends Authenticatable
{
    use HasFactory, SoftDeletes, NestedSetTrait;

    protected $keyType = 'uuid';

    protected $fillable = [
        'code',
        'title',
        'description',
    ];

    protected static function buildTreeConfig(): Base
    {
        $config= new Base(true);
        // $config->parent()->setType('uuid'); <-- `parent type` set up automatically from `$model->keyType`

        return $config;
    }

    // protected static function buildTreeConfig(): BaseConfig
    // {
    //     return BaseConfig(TreeAttribute::make('uuid')->setAutoGenerate(false));
    // }
}
