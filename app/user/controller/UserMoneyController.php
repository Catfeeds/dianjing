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

class UserMoneyController extends HomeBaseController
{
    /**
     * 充值记录
     * @return mixed
     */
    public function index()
    {
        $data  = model('UserMoney') -> index(session('user')['id'],1);
        $this -> assign('diamond',$data);
        $data  = model('UserMoney') -> index(session('user')['id'],2);
        $this -> assign('gold',$data);
        $this -> assign('page',$data->render());
        return $this -> fetch();
    }
}