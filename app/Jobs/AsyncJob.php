<?php
/**
 * Created by PhpStorm.
 * User: evolution
 * Date: 16-11-29
 * Time: 下午3:40
 */
namespace App\Jobs;

use App\Entity\AsyncData;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class AsyncJob extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $asyncData;

    public function __construct(AsyncData $asyncData)
    {
        $this->asyncData = $asyncData;
    }

    /**
     * 开始执行任务
     */
    public function handle()
    {
        $servicename = $this->asyncData->getServiceName();
        if (!class_exists($servicename)) {
            return;
        } else {
            $asyncClass = new \ReflectionClass($servicename);
            $asyncSercie = $asyncClass->newInstance();
            $asyncSercie->doAction($this->asyncData->getParams());
        }
    }

    /**
     * 获取消费者类
     *
     * @return mixed|string
     */
    public function getServiceName()
    {
        return $servicename = $this->asyncData->getServiceName();
    }

    /**
     * 处理失败任务
     *
     * @return void
     */
    public function failed()
    {
        // Called when the job is failing...
    }
}
