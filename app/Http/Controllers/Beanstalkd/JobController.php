<?php

namespace App\Http\Controllers\Beanstalkd;
use App\Entity\Result;
use App\Http\Controllers\XinController;
use App\Services\BeanstalkdService;
use Mockery\Exception;
use Input;

class JobController extends XinController
{

	public function __construct(){
		parent::__construct();

	}
	public function anyIndex(){
		return view('beanstalkd.list_tubes');
	}
	/**
	 * 列出所有tube
	 */
	public function anyListtube(){
		$data['tubes'] = BeanstalkdService::getInstance()->getTubeList();
		return view('beanstalkd.tubeslist',$data);
	}
	/**
	 * 查看一个tube内数据
	 *
	 */
	public function anyTubedetail(){
		$tubename = trim(Input::get('tube'));
//		$result = new Result();
//		if(!$tubename){
//			return $result->setCode(Result::CODE_ERROR)->setMsg('请选择通道')->toJson();
//		}
		$data['tubedetail'] = BeanstalkdService::getInstance()->getTubeDetail($tubename);
		$data['tubedata'] = BeanstalkdService::getInstance()->getTubeData($data['tubedetail']);
		return view('beanstalkd.tube_detail',$data);

	}
	/**
	 * 删除任务
	 */
	public function anyDeljob(){
		$jobid = intval(Input::get('jobid'));
		BeanstalkdService::getInstance()->delJob($jobid);
		$result = new Result();
		return $result->setCode(Result::CODE_SUCCESS)->setMsg('操作成功')->toJson();
	}
	/**
	 * 休眠任务
	 */
	public function anyBuryjob(){
		$tube = trim(Input::get('tube'));
		BeanstalkdService::getInstance()->buryJob($tube);
		$result = new Result();
		return $result->setCode(Result::CODE_SUCCESS)->setMsg('操作成功')->toJson();
	}
	/**
	 * 唤醒任务
	 */
	public function anyKickjob(){
		$jobid = intval(Input::get('jobid'));
		BeanstalkdService::getInstance()->kickJob($jobid);
		$result = new Result();
		return $result->setCode(Result::CODE_SUCCESS)->setMsg('操作成功')->toJson();
	}
	/**
	 * 消费一个任务
	 */
	public function anyResevejob(){
		BeanstalkdService::getInstance()->reserveJob();

	}
}
