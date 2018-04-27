<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\controller;

use cmf\controller\HomeBaseController;
use app\wechat\model\UserModel;
use think\Db;
use think\Model;

class IndexController extends HomeBaseController
{

	//首页
    public function index()
    {
        if(session('openid', '', 'wechat') != ''){
            //$list = $user->table('user_status stats, user_profile profile')->where('stats.id = profile.typeid')->field('stats.id as id, stats.display as display, profile.title as title,profile.content as content')->order('stats.id desc' )->select(); 
            // $articles = Db::name('portal_post')->where()->paginate(10);
            $Model = new Model();
            $sql = 'select a.id,a.title,b.content from cmf_portal_post as a, cmf_portal_category_post as b where a.id=b.post_id ';
            $articles = $Model->query($sql);
            $articles->each(function($item, $key){
                $user_id = $item['user_id'];
                $user = Db::name('user')->where('id',$user_id)->find();
                $item['username'] = $user['user_login'];
                $item['userimg'] = $user['avatar'];
                $item['pimg'] = $item['more'];
                $item['post_content'] = htmlspecialchars_decode($item['post_content']);
                return $item;
            });
            $this->assign('article', $articles);
            return $this->fetch(':index');
        }else{
            $this->redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxd66e44b388ebe533&redirect_uri=http://tp.musiiot.top/wechat/login/wechatLogin&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect',302);
        }        
    }

    //乡村美宿
    public function xcms()
    {
    	return $this->fetch(':xcms');
    }

    //乡村村务
    public function xccw()
    {
    	return $this->fetch(':xccw');
    }

    //乡村客厅
    public function xckt()
    {
    	return $this->fetch(':xckt');
    }

    //吾村
    public function wc()
    {
        $openid = session('openid', '', 'wechat');
        if(UserModel::get(['openid' => $openid])['is_real']){
            return $this->fetch(':wc');
        }else{
            $img = UserModel::get(['openid' => $openid])['user_img'];
            $this->assign('user_url', $img);
            return $this->fetch(':register');
        }
    }

    //真物
    public function zw()
    {
    	return $this->fetch(':zw');
    }

	//村务公开
    public function cwgk()
    {
        return $this->fetch(':cwgk');
    }

    //村委信箱
    public function cwxx()
    {
    	return $this->fetch(':cwxx');
    }

    //本村概况
    public function bcgk()
    {
    	return $this->fetch(':bcgk');
    }

    //吾村乡贤
    public function wcxx()
    {
    	return $this->fetch(':wcxx');
    }


    //景点民宿
    public function jdms()
    {
    	return $this->fetch(':jdms');
    }

    //乡村故事
    public function xcgs()
    {
    	return $this->fetch(':xcgs');
    }

    //实名认证
    public function register()
    {
    	return $this->fetch(':register');
    }

    //设置
    public function setting()
    {
        return $this->fetch(':setting');
    }

    //美丽乡村
    public function beautiful()
    {
        return $this->fetch(':beautiful');
    }

    //绝美路线
    public function rode()
    {
        return $this->fetch(':rode');
    }

    //中外乡村
    public function zwxc()
    {
        return $this->fetch(':zwxc');
    }

    //乡村沙龙
    public function xcsl()
    {
        return $this->fetch(':xcsl');
    }

    //设计乡村
    public function design()
    {
        return $this->fetch(':design');
    }

}
