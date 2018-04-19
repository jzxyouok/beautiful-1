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

	public function creatCode($phone, $code){
            $this->data([
                  'phone' => $phone,
                  'code' => $code,
                  'time' => ''
            ]);
            $this->save();
      }
}

 ?>