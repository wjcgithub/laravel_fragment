<?php
/**
 * Created by PhpStorm.
 * User: evolution
 * Date: 16-10-12
 * Time: 上午11:25
 */

namespace App\Http\Middleware;

use Closure;

class CustomPipe
{
    public function handle($val, Closure $next)
    {
        echo "<hr>middle pipe perform success<hr>";
    }
}