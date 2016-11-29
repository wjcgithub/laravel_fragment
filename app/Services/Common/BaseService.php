<?php
/**
 * Created by PhpStorm.
 * User: evolution
 * Date: 16-11-29
 * Time: 下午4:09
 */
namespace App\Services\Common;

class BaseService
{
    /**
     * 服务对象静态实例
     *
     * @var static
     */
    protected static $container = [];

    private function __construct()
    {

    }

    /**
     * 服务对象实例（单例模式）
     * @return static
     */
    public static function getInstance()
    {
        if (array_key_exists(static::class, static::$container) == false || empty(static::$container[static::class])) {
            static::$container[static::class] = new static();
        }
        return static::$container[static::class];
    }
}