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


use app\user\model\GoodsModel;
use cmf\controller\HomeBaseController;

class GoodsController extends HomeBaseController
{
    /**
     * 商城中心首页
     * @return mixed
     */
    public function index()
    {
        $user = session('user');
        if (empty($user))
        {
            $this -> error('您未登陆');
        }
        $this -> assign('gold',empty($user['gold']['number'])?0:$user['gold']['number']);
        $data  = model('Goods') -> index();
        $this -> assign('data',$data);
        return $this -> fetch();
    }

    /**
     * 单独商品详情
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\DbException
     */
    public function thisOne()
    {
        $id = $this -> request -> param('id');
        if (empty($id))
        {
            $this -> error('缺少参数');
        }
        $data = GoodsModel::get($id) -> toArray();
        $this -> assign('data',$data);
        return $this -> fetch();
    }

    /**
     * 添加订单
     * TODO 事物操作
     */
    public function order()
    {
        if ($this -> request -> isPost())
        {
            $data   = $this -> request -> param();
            $result = $this -> validate($data,'order');
            if ($result!==true)
            {
                $this -> error($result);
            }
            $user   = session('user');
            //减少金币
            $data['all_price'] = $data['price']*$data['number'];

            if ($data['all_price'] > $user['gold']['number'])
            {
                $this -> error('您的余额不足');
            }

            $array = array(
                'user_id' => $user['id'],
                'id'      => $user['gold']['id'],
                'balance' => $user['gold']['number'],
                'number'  => $data['all_price'],
                'test'    => '商品兑换',
            );
            dump($array);exit;
            $result = model('UserCurrency') -> reduce($array);

            if ($result)
            {
                //添加订单
                $result = model('Order') -> addOne($data);

                if ($result===true)
                {
                    $this -> success('添加成功',cmf_url('Order/index'));
                }
                else
                {
                    $this -> error($result);
                }
            }
            else
            {
                $this -> error($result);
            }

        }
        else
        {
            $this -> error('错误操作');
        }
    }
}