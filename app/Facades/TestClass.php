<?php
/**
 * Created by PhpStorm.
 * User: evolution
 * Date: 16-9-9
 * Time: 下午5:20
 */
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TestClass extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'test';
    }
}