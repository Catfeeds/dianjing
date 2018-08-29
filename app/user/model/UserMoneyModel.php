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

class UserMoneyModel extends Model
{
    /**
     * 获取记录
     * @param $user_id
     * @param int $id
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function index($user_id,$id=1)
    {
        $where = array(
            'a.user_id'    => $user_id,
            'a.deletetime' => 1,
            'c.id'         => $id
        );

        $data  = $this
            -> field('a.id,a.time,a.number,a.balance,a.test,a.type')
            -> alias('a')
            -> join('__USER_CURRENCY__ b','a.currency_id=b.id')
            -> join('__CURRENCY__ c','b.currency_id=c.id')
            -> where($where)
            -> paginate(10);
        return $data;
    }

    /**
     * 添加交易记录
     * @param $data
     * @return false|int
     */
    public function addOne($data)
    {
        $this -> data(
            array(
                'user_id'       => $data['user_id'],
                'currency_id'   => $data['id'],
                'type'          => $data['type'],
                'number'        => $data['number'],
                'balance'       => $data['balance'],
                'test'          => $data['test'],
                'time'          => time(),
            )
        );
        return $this -> save();
    }
}