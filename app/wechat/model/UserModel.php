<?php 

namespace app\wechat\model;

use think\Db;
use think\Model;

/**
* 
*/
class UserModel extends Model
{
	protected $table = 'cmf_wechat_user';

	public static function addUser($openid, $nick_name, $user_img){
		$this->data([
		    'id' => '',
            'openid' => $openid,
            'authority' => '',
            'nick_name' => $nick_name,
            'real_name' => '',
            'user_img' => $user_img,
            'phone' => '',
            'id_number' => '',
            'village' => '',
            'is_real' => ''
		]);
		$this->save();
	}
}

 ?>