<?php
namespace App\Services\Common;

use App\Entity\AsyncData;
use App\Jobs\AsyncJob;
use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Entity\Result;

/**
 * 公用业务 如：品牌 城市
 * Class CommonService
 *
 * @package App\Services
 */
class CommonService extends BaseService
{
    use DispatchesJobs;

    /**
     * 创建异步任务或者定时任务
     * @param AsyncData $asyncData
     * @return Result
     */
    public function createAsyncTask(AsyncData $asyncData)
    {
        $result = new Result();
        try {
            $asyncJob = new AsyncJob($asyncData);
            if ($asyncData->getDelays()) {
                $asyncJob->delay($asyncData->getDelays());
            }
            if ($asyncData->getQueue()) {
                $asyncJob->onQueue($asyncData->getQueue());
            }
            $this->dispatch($asyncJob);
            $result->setCode(Result::CODE_SUCCESS);
        }
        catch(\Exception $e)
        {
            $result->setCode(Result::CODE_ERROR)->setMsg($e->getMessage());
        }
        return $result;

    }

    /**
     * 生成签名函数
     *
     * @param [type] $data
     *            参数数组
     * @param string $secret
     *            密钥
     * @param string $undate
     *            签名中是否使用日期
     * @return [type] [description]
     */
    public static function create_sn($data, $secret = '', $usedate = true)
    {
        $debug = isset($data['debug']) ? $data['debug'] : '';
        unset($data['sn'], $data['debug']);
        ksort($data);
        $str = '';
        foreach ($data as $key => $value) {
            $str .= "&$key=$value";
        }
        $str = trim($str, "&") . $secret;
        if ($usedate) {
            $str .= date('Y-m-d');
        }
        if ($debug && $debug == $secret) {
            echo "md5 str:", $str;
            echo '<br>';
        }
        return strtolower(md5($str));
    }

}