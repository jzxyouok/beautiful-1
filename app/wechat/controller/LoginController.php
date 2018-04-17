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
namespace app\wechat\controller;

use think\Validate;
use cmf\controller\HomeBaseController;
use app\wechat\model\UserModel;
 
require 'util.php';
class LoginController extends HomeBaseController
{

    /**
     * 微信公众号登录
     */
    public function wechatLogin(){
        $user = new UserModel;
        $code = $this->request->get("code");
        echo $code;
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxd66e44b388ebe533&secret=581d2993654498ab3441db1bbf56fa9e&code='.$code.'&grant_type=authorization_code';
        $res = json_decode(Util::HttpGet($url));
        print_r($res);
        $openid = $res->openid;
        $access_token = $res->access_token;
        if ($user->where('openid', $openid)->find() == '') {
            $info_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token.'&openid='.$openid.'&lang=zh_CN';
            $user_info = json_decode(Util::HttpGet($info_url));
            $nick_name = $user_info->nickname;
            $user_img = $user_info->headimgurl;
            echo "<br />";
            echo $nick_name;
            $user->data([
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
            $user->save();      
    }
    session('openid', $openid, 'wechat');
    return redirect($this->request->root() . '/');
}

}