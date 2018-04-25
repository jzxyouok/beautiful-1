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
namespace app\user\controller;

use cmf\controller\AdminBaseController;
use think\Request;
use think\Db;

class AdminOauthController extends AdminBaseController
{

    /**
     * 后台第三方用户列表
     * @adminMenu(
     *     'name'   => '第三方用户',
     *     'parent' => 'user/AdminIndex/default1',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '第三方用户',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        $oauthUserQuery = Db::name('wechat_user');

        $lists = $oauthUserQuery->paginate(10);
        $lists->each(function($item, $key){
            $village_id = $item['village'];
            if ($village_id != 0) {
                $que = Db::name('village')->where('id',$village_id)->find();
                $item['village'] = $que['name'];
            }else{
                $item['village'] = '未实名认证';
            }
            return $item;
        });

        // 获取分页显示
        $page = $lists->render();
        $this->assign('lists', $lists);
        $this->assign('page', $page);
        // 渲染模板输出
        return $this->fetch();
    }

    /**
     * 后台删除第三方用户绑定
     * @adminMenu(
     *     'name'   => '删除第三方用户绑定',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '删除第三方用户绑定',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        $id = input('param.id', 0, 'intval');
        if (empty($id)) {
            $this->error('非法数据！');
        }
        Db::name("wechat_user")->where("id", $id)->delete();
        $this->success("删除成功！", "admin_oauth/index");
    }


    public function edit()
    {
        $id = input('param.id', 0, 'intval');
        if (empty($id)) {
            $this->error('非法数据！');
        }
        $user = Db::name("wechat_user")->where("id", $id)->find();
        $name = $user['real_name'];
        $phone = $user['phone'];
        $this->assign('id', $id);
        $this->assign('name', $name);
        $this->assign('phone', $phone);
        return $this->fetch();
    }


    public function editPost()
    {
        $request = request();
        $id = $request->post('id');
        $name = $request->post('name');
        $phone = $request->post('phone');
        $id_num = $request->post('id_number');
        if ($id_num) {
            $isReal = 1;
        }else{
            $isReal = 0;
        }
        Db::name('wechat_user')
            ->where('id', $id)
            ->update([
                'real_name' => $name,
                'phone'     => $phone,
                'id_number' => $id_num,
                'is_real' => $isReal
            ]);
        $this->success("修改成功！", "admin_oauth/index");
    }

}