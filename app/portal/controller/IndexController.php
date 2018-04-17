<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\controller;

use cmf\controller\HomeBaseController;

class IndexController extends HomeBaseController
{

	//首页
    public function index()
    {
        return $this->fetch(':index');
    }

    //乡村美宿
    public function xcms()
    {
    	return $this->fetch(':xcms');
    }

    //乡村村务
    public function xccw()
    {
    	return $this->fetch(':xccw');
    }

    //乡村客厅
    public function xckt()
    {
    	return $this->fetch(':xckt');
    }

    //吾村
    public function wc()
    {
    	return $this->fetch(':wc');
    }

    //真物
    public function zw()
    {
    	return $this->fetch(':zw');
    }

	//村务公开
    public function cwgk()
    {
        return $this->fetch(':cwgk');
    }

    //村委信箱
    public function cwxx()
    {
    	return $this->fetch(':cwxx');
    }

    //本村概况
    public function bcgk()
    {
    	return $this->fetch(':bcgk');
    }

    //吾村乡贤
    public function wcxx()
    {
    	return $this->fetch(':wcxx');
    }


    //景点民宿
    public function jdms()
    {
    	return $this->fetch(':jdms');
    }

    //乡村故事
    public function xcgs()
    {
    	return $this->fetch(':xcgs');
    }

    //实名认证
    public function register()
    {
    	return $this->fetch(':register');
    }

    // public function xcms()
    // {
    // 	return $this->fetch(':xcms');
    // }

    // public function xcms()
    // {
    // 	return $this->fetch(':xcms');
    // }
}
