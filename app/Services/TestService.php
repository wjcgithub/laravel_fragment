<?php
/**
 * Created by PhpStorm.
 * User: evolution
 * Date: 16-9-9
 * Time: 下午2:03
 */
namespace App\Services;

use App\Contracts\TestContract;

class TestService implements TestContract
{
    public function callMe($controller)
    {
        dd('Call Me From TestServiceProvider In '.$controller);
    }

    public function handle($data, \Closure $next, $method)
    {
        $this->$method($data, $next);
    }

    public function indexValidate($data, \Closure $next)
    {
        echo "testvalidate";
        $result = $next($data);
        echo "<hr>pipe5:  middle pipe perform success<hr>";
        return $result;
    }
}