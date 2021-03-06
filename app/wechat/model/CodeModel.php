<?php 

namespace app\wechat\model;

use think\Db;
use think\Collection;
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
              'time' => date("Y-m-d H:i:s")
            ]);
        $cd->save();
      }


    public static function getCode($phone){
    	$cd = new CodeModel();
      	// $user = $cd->get(function($query, $phone){
      	// 	$query->where('phone', $phone)->limit(1)->order('time', 'desc');
      	// });
      	// return $cd->code;
      	$res = $cd->where('phone', $phone)
		    ->limit(1)
		    ->order('time', 'desc')
		    ->find();
        if($res != ''){
          return $res->data;
        }
		
      }
}

 ?>