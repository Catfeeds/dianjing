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
            $id        = $this->request->param("id", 2, "intval");
            $userModel = new UserModel();
            $user      = $userModel->field('id,user_login,user_nickname,avatar')->where('id', $id)->find() -> toArray();

            if (empty($user)) {
                $this->error("查无此人！");
            }
            $currency = model('UserCurrency') -> index($user['id']);
            if (empty($currency))
            {
                $user['diamond'] = 0;
                $user['gold']   = 0;
            }
            else
            {
                foreach ($currency as $val)
                {
                    switch ($val['currency_id'])
                    {
                        case 1:
                            $user['diamond'] = $val;
                        case 2:
                            $user['gold']    = $val;
                        default:
                    }
                }
            }
            session('user',$user);
        }


        $this -> assign('user',$user);
        return $this -> fetch();
    }


}