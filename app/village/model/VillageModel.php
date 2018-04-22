<?php 

namespace app\village\model;

use think\Db;
use think\Collection;
use think\Model;

/**
* 
*/
class VillageModel extends Model
{
	protected $table = 'cmf_village'

	public static function addVillage($v_name, $division){
		$village = new VillageModel;
		$village->data([
			'id' => '',
		    'v_name' => $v_name,
		    'division'    => $division
		]);
		$village->save();
	}

	public static function rmVillage($v_name){
		VillageModel::destroy(['v_name' => $v_name]);
	}

	public static function showVillage(){
		
	}
}