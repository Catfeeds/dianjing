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

namespace app\admin\model;


use think\Model;

class OrderModel extends Model
{
    /**
     * 订单数据
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $where = array(
            'a.deletetime' => 1,
        );

        $data = $this
            -> alias('a')
            -> join('__USER__ b','a.user_id=b.id')
            -> join('__GOODS__ c','a.goods_id=c.id')
            -> field('a.id,a.number,a.all_price,a.time,a.status,b.user_login,b.user_nickname,c.name as goods')
            -> where($where)
            -> paginate(10);
        return $data;
    }

    /**
     * 操作出货
     * @param $id
     * @return bool
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function delivery($id)
    {
        $where = array(
            'id' => $id
        );
        $data  = $this -> where($where) -> find() -> toArray();
        if (empty($data))
        {
            return false;
        }
        //商品库存减少
        model('goods') ->  reduce($data['goods_id'],$data['number']);

        $this -> where($where) -> setInc('status');

    }

    /**
     * 获取订单详情
     * @param $id
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function thisOne($id)
    {
        $where = array(
            'a.deletetime' => 1,
            'a.id'         => $id,
        );

        $data = $this
            -> alias('a')
            -> join('__USER__ b','a.user_id=b.id')
            -> join('__GOODS__ c','a.goods_id=c.id')
            -> field('a.*,b.user_login,b.user_nickname,c.name as goods,c.price')
            -> where($where)
            -> find();
        return $data -> toArray();
    }
}