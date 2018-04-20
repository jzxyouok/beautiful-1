<?php 

namespace app\wechat\model;

use think\Db;
use think\Model;

/**
* 
*/
class CodeModel extends Model
{
	protected $table = 'cmf_code';

	public static function creatCode($phone, $code){
		$cd = new CodeModel();
        $cd->data([
              'phone' => $phone,
              'code' => $code,
              'time' => CURRENT_TIMESTAMP
        ]);
        $cd->save();
      }


    public static function getCode($phone){
    	$cd = new CodeModel();
      	// $user = $cd->get(function($query, $phone){
      	// 	$query->where('phone', $phone)->limit(1)->order('time', 'desc');
      	// });
      	// return $cd->code;
      	$cd->where('phone', $phone)
		    ->limit(1)
		    ->order('time', 'desc')
		    ->select();
		$cd->each(function($item, $key){
		    // $item['user_nickname']='老猫不老';
		    return $item;

		});
      }
}

 ?>