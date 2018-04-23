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

use cmf\controller\AdminBaseController;
use app\portal\model\PortalPostModel;
use app\portal\service\PostService;
use app\portal\model\PortalCategoryModel;
use think\Db;
use app\admin\model\ThemeModel;
use think\request;
use app\portal\model\VillageModel;

class AdminVillageController extends AdminBaseController
{
    
    public function index()
    {
        return $this->fetch();
    }

    public function add()
    {
        return $this->fetch();   
    }


    public function addPost()
    {
        $request = request();
        $v_name = $request->post('name');
        $division = $request->post('division');
        VillageModel::addVillage($v_name, $division);
        $this->success('添加成功');
    }


    public function edit()
    {
        return $this->fetch();
    }

}
