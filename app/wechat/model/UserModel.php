<?php 

namespace app\wechat\model;

use think\Db;
use think\Model;

/**
* 定义用户模型
*/
class UserModel extends Model
{
	protected $table = 'cmf_wechat_user';

      /* 定义添加用户方法 */
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

      /* 定义用户验证方法 */
      public static function userAuth($openid, $name, $phone, $village){
            $this->save([
                'real_name' => $name,
                'phone'     => $phone,
                'village'   => $village
            ], ['openid' => $openid]);
      }
}

 ?>