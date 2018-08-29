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

class GoodsModel extends Model
{
    /**
     * 获取没删除的虚拟币信息
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index($where)
    {
        $data  = $this
            -> field('a.*,b.title as ratio_name')
            -> alias('a')
            -> join('__CURRENCY__ b','a.currency_id=b.id','LEFT')
            -> where($where)
            ->paginate(10);
        return $data;
    }

}