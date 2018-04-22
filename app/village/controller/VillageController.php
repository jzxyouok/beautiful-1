<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Powerless < wzxaini9@gmail.com>
// +----------------------------------------------------------------------
namespace app\village\controller;

use think\Validate;
use think\Request;
use cmf\controller\HomeBaseController;
use app\village\model\VillageModel;

/**
* 乡村管理控制器
*/
class VillageController extends HomeBaseController
{
	/* 添加乡村方法 */
	public function addVillage(){
		$request = request();
		$name = $request->port('v_name');
		$division = $request->port('division');
		VillageModel::addVillage($name, $division);
	}

	/* 删除乡村方法 */
	public function rmVillage(){
		$request = request();
		$name = $request->post('v_name');
		VillageModel::rmVillage($name);
	}

	/* 显示当前所有乡村方法 */
	public function showVillage(){

	}

}