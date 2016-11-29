<?php
/**
 *返回结果通用类
 * User: jiangtiezhu
 * Date: 15/10/23
 * Time: 上午10:46
 */
namespace App\Entity;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class Result implements Arrayable,Jsonable
{
    const CODE_SUCCESS = 200;
    const CODE_ERROR = 0;
    const CODE_UPDATE = 201;
    const CODE_NOAUTH = 403;
    private $reslut_arr = [
        'code' => - 1,
        'msg' => '',
        'data' => '',
        'cnt' => 0
    ];

    public function __construct()
    {

    }

    /**
     * 设置状态码
     * @param $code
     * @return $this
     */
    public function setCode($code)
    {
        $this->reslut_arr['code'] = $code;
        return $this;
    }

    /**
     * 获取状态码
     *
     * @return mixed
     */
    public function getCode()
    {
        return $this->reslut_arr['code'];
    }

    /**
     * 设置返回的消息
     * @param $msg
     * @return $this
     */
    public function setMsg($msg)
    {
        $this->reslut_arr['msg'] = $msg;
        return $this;
    }

    /**
     * 获取返回的消息
     * @return mixed
     */
    public function getMsg()
    {
        return $this->reslut_arr['msg'] ;
    }

    /**
     * 设置几个数据
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->reslut_arr['data'] = $data;
        return $this;
    }

    /**
     * 获取结果数据
     *
     * @return mixed
     */
    public function getData()
    {
        return  $this->reslut_arr['data'];
    }

    /**
     * 设置结果数量
     *
     * @param $cnt
     * @return $this
     */
    public function setCnt($cnt)
    {
        $this->reslut_arr['cnt'] = $cnt;
        return $this;
    }

    /**
     * 获取结果数量
     *
     * @return mixed
     */
    public function getCnt()
    {
        return $this->reslut_arr['cnt'];
    }

    /**
     *
     * @return array 输出数组
     */
    public function toArray()
    {
        return  $this->reslut_arr;
    }

    /**
     * 返回json
     * @param int $option
     * @return string
     */
    public function toJson($option=0)
    {
        return json_encode($this->reslut_arr,$option);
    }
}