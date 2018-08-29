<?php
// +----------------------------------------------------------------------
// | 83bid [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright © 2018-2028 AII Rights Reserved
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +---------------------------------------------------------------------
// | Author: 谢鑫磊 < 774084941@qq.com>
// +----------------------------------------------------------------------

namespace app\user\controller;


use app\portal\model\UserModel;
use cmf\controller\HomeBaseController;

class PersonalController extends HomeBaseController
{
    public function _initialize()
    {
        parent::_initialize();

    }
    /**
     * 个人中心首页
     * @return mixed
     */
    public function index()
    {
        $user      = session('user');
        if (empty($user))
        {
            $this -> redirect('login/index');
        }


        $this -> assign('user',$user);
        return $this -> fetch();
    }


}