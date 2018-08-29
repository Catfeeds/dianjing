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

namespace app\user\model;


use think\Model;

class OrderModel extends Model
{
    /**
     * @param $user_id
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index($user_id)
    {
        $where = array(
            'a.user_id'    => $user_id,
            'a.deletetime' => 1,
            'a.status'     => ['neq',0],
        );
        $data = $this
            -> field('b.img,b.name,a.number,a.id,a.time,a.status,a.all_price')
            -> alias('a')
            -> join('__GOODS__ b','a.goods_id=b.id')
            -> where($where)
            -> select()
            -> toArray();
        return $data;
    }

    /**
     * 添加一条记录
     * @param $data
     * @return array|string
     */
    public function addOne($data)
    {
        $data['time']      = time();
        $data['id']        = date('YmdHis').time().mt_rand(00000,99999);
        $data['user_id']   = session('user')['id'];
        $result= $this
            -> validate(true)
            -> allowField(true)
            -> save($data);
        if (!$result)
        {
            return $this -> getError();
        }
        else
        {
            return true;
        }
    }
}