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


use cmf\controller\HomeBaseController;

class OrderController extends HomeBaseController
{
    /**
     * 兑换记录
     * @return mixed
     */
    public function index()
    {
        $user = session('user');
        if (empty($user))
        {
            $this -> error('你未登陆');
        }
        $data = model('Order') -> index($user['id']);

        $this -> assign('data',$data);
        return $this -> fetch();
    }
}