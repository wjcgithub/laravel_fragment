<?php
/**
 * Created by PhpStorm.
 * User: evolution
 * Date: 16-11-29
 * Time: 下午1:35
 */
namespace App\Entity;

class AsyncData
{
    const HIGH = "queue-high";
    const LOW = "queue-low";

    protected $attributes = [];

    /**
     * 获取要处理的消费者类
     *
     * @return mixed|string
     */
    public function getServiceName()
    {
        if (isset($this->attributes['servicename'])) {
            return $this->attributes['servicename'];
        }
        return '';
    }

    /**
     * 设置要处理的消费者类
     *
     * @param $value
     */
    public function setServiceName($value)
    {
        $this->attributes['servicename'] = config('jobs.jobsnamespace').$value;
        return $this;
    }

    /**
     * 获取消费的参数
     *
     * @return mixed|string
     */
    public function getParams()
    {
        if (isset($this->attributes['params'])) {
            return $this->attributes['params'];
        }
        return '';
    }

    /**
     * 设置消费的参数
     *
     * @param $value
     */
    public function setParams($value)
    {
        $this->attributes['params'] = $value;
        return $this;
    }

    /**
     * 获取任务的延迟时间（秒）
     *
     * @return int|mixed
     */
    public function getDelays()
    {
        if (isset($this->attributes['delays'])) {
            return $this->attributes['delays'];
        }
        return 0;
    }

    /**
     * 设置任务的延迟时间（秒）
     *
     * @param $value
     */
    public function setDelays($value)
    {
        $this->attributes['delays'] = $value;
        return $this;
    }

    /**
     * 设置队列
     * @param $value
     */
    public function setQueue($value)
    {
        $this->attributes['queue'] = $value;
        return $this;
    }

    /**
     * 获取队列
     *
     * @return mixed
     */
    public function getQueue()
    {
        return $this->attributes['queue'];
    }
    /**
     * 设置优先级
     *
     * @param $value
     */
    public function setPriority($value)
    {
        $this->attributes['priority'] = $value;
        return $this;
    }

    /**
     * 获取优先级
     *
     * @return int|mixed
     */
    public function getPriority()
    {
        if (isset($this->attributes['priority'])) {
            return $this->attributes['priority'];
        }
        return 0;
    }

}