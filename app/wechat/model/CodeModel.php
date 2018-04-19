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
              'time' => ''
        ]);
        $cd->save();
      }
}

 ?>