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

class IndexController extends HomeBaseController
{

	//首页
    public function index()
    {
        if(session('openid', '', 'wechat') != ''){
            // $articles = Db::name('portal_post')->where()->paginate(10);
            $articles = Db::query('select * from cmf_portal_category_post,cmf_portal_post,cmf_user where cmf_portal_category_post.post_id=cmf_portal_post.id and cmf_user.id=cmf_portal_post.user_id and category_id=1');
            // $articles->each(function($item, $key){
            //     $user_id = $item['user_id'];
            //     $user = Db::name('user')->where('id',$user_id)->find();
            //     $item['username'] = $user['user_login'];
            //     $item['userimg'] = $user['avatar'];
            //     $item['pimg'] = $item['more'];
            //     $item['post_content'] = htmlspecialchars_decode($item['post_content']);
            //     return $item;
            // });
            for ($i=0; $i < sizeof($articles); $i++) { 
                $articles[$i]['post_content'] = htmlspecialchars_decode($articles[$i]['post_content']);
            }
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


    public function loadMore(){
        $request = $this->request;
        $page = $request->post('page');
        $offset = 5;
        $rows = 5;
        echo $offset+($page-1)*5.'11';
        //$articles = Db::query('select * from cmf_portal_category_post,cmf_portal_post,cmf_user where cmf_portal_category_post.post_id=cmf_portal_post.id and cmf_user.id=cmf_portal_post.user_id and category_id=1 limit '.$offset+($page-1)*5.','.$rows);
        // for ($i=0; $i < sizeof($articles); $i++) { 
        //         $articles[$i]['post_content'] = htmlspecialchars_decode($articles[$i]['post_content']);
        //     }
        // return $this->success($articles);
    }

}
