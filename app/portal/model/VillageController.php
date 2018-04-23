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
namespace app\portal\model;

use think\Model;

class VillageModel extends Model
{
	protected $table = "cmf_village";

	public static function addVillage($name, $division){
		$vliiage = new VillageModel;
		$village->data([
			'id'       => null,
		    'v_name'   => $name,
		    'division' => $division
		]);
		$village->save();
	}
}