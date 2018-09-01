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

class RechargeController extends HomeBaseController
{
    /**
     * 砖石充值
     */
    public function index()
    {
        $user = session('user');
        if (empty($user))
        {
            $this -> error('您未登录');
        }
        $this -> assign('user',$user);
        $id   = $this->request->param("id", 1, "intval");
        switch ($id)
        {
            case 1:
                $data = Model('Currency') -> index($id);
                $this -> assign('data',$data);

                return $this -> fetch();
                break;
            case 2:
                $data = Model('Currency') -> index($id);
                $this -> assign('data',$data);

                return $this -> fetch('exchange');
                break;
            default:
                $this -> error('未知');
                return false;
        }

    }

    /**
     * 充值兑换提交
     */
    public function takePost()
    {
        if ($this -> request -> isPost())
        {
            $param = $this -> request -> param();
            $result = $this -> validate($param,'recharge');
            if ($result!==true)
            {
                $this -> error($result);
            }
            
            $data = explode(',',$param['number']);
            $user = session('user');
            switch ($param['type'])
            {
                //充值 todo 充值接口 事务操作
                case 1:


                    $array = array(
                        'type'          => $param['type'],
                        'user_id'       => $user['id'],
                        'ratio'         => $data[0],
                        'number'        => $data[1],
                        'diamond'       => $user['diamond'],
                        'gold'          => $user['gold'],
                        'currency_id'   => 1,
                    );
                    break;
                // 兑换
                case 2:

                    $diamond = empty($user['diamond']['number']) ? 0 : $user['diamond']['number'];
                    if ($data[1] > $diamond)
                    {
                        $this -> error('您的砖石不足');
                    }
                    $array  = array(
                        'type'          => $param['type'],
                        'user_id'       => $user['id'],
                        'ratio'         => $data[0],
                        'number'        => $data[1],
                        'diamond'       => $user['diamond'],
                        'gold'          => $user['gold'],
                        'currency_id'   => 2,
                    );
                    break;
                default:

            }
            $result = model('UserCurrency') -> recharge($array);
            if ($result)
            {
                $this -> success('成功',cmf_url('personal/index'));
            }
            else
            {
                $this -> error('失败',cmf_url('personal/index'));
            }
        }
        else
        {
            $this -> error('错误操作',cmf_url('personal/index'));
        }
    }
}