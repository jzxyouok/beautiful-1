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
use think\Request;
use cmf\controller\HomeBaseController;
use app\wechat\model\CodeModel;
use app\wechat\model\UserModel;
 
require 'util.php';
require 'sms.php';

class AuthController extends HomeBaseController
{
    protected $table = 'cmf_code';

    public function sendCode(){
        $request = request();
        $phone = $request->post('phone');
        $code = rand(pow(10,(4-1)), pow(10,4)-1);
        $text = '【美丽乡村】您的验证码是'.$code;
        CodeModel::creatCode($phone, $code);
        $res = sendSms($phone, $text);
        if($res['code'] == 0){
            $this->success('发送成功');
        }else{
            $this->error('发送失败');
        }
    }


    public function checkCode(){
        $request = request();
        $phone = $request->post('phone');
        $code = $request->post('code');
        $name = $request->post('name');
        $village = $request->post('village');
        $openid = session('openid', '', 'wechat');
        $cd = new CodeModel();
        $realCode = $cd->where('phone', $phone)->find();
        if ($code == $realCode) {
            UserModel::userAuth($openid, $name, $phone, $village);
            $this->success('验证成功');
        }else{
            $this->error('验证失败');
        }
    }



}