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
      	$user = $this->get(function($query){
      		$query->where('phone', $phone)->limit(1)->order('time', 'desc');;
      	});
      	return $this-getAttr('code');

		});
      }
}

 ?>