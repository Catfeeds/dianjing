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

class GoodsModel extends Model
{
    /**
     * 获取商品数据
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $where = array(
            'a.status' => 1,
            'a.deletetime' => 1,
        );
        $data = $this
            -> alias('a')
            -> join('__CURRENCY__ b','a.currency_id=b.id')
            -> where($where)
            -> field('a.id,a.name,a.img,b.title,a.price,a.convert')
            -> select()
            -> toArray();
        return $data;
    }
    

}