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

class CurrencyModel extends Model
{
    /**
     * 获取没删除的虚拟币信息
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $where = array(
            'a.deletetime' => 1,//删除标识
        );
        $data  = $this
            -> field('a.*,b.title as ratio_name')
            -> alias('a')
            -> join('__CURRENCY__ b','a.ratio_id=b.id','LEFT')
            -> where($where)
            ->paginate(10);
        return $data;
    }

    /**
     * 获取对应数据
     * @param string $field
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getField($field='*')
    {
        $where = array(
            'deletetime' => 1,//删除标识
        );
        $data  = $this
            -> field($field)
            -> where($where)
            -> select();
        return $data;
    }
}