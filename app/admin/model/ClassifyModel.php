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

class ClassifyModel extends Model
{
    /**
     * 获取分页数据
     * @param $where
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $where = array(
            'deletetime' => 1,
        );
        $data = $this
            -> where($where)
            -> order('list_order')
            -> select()
            -> toArray();
        return $data;
    }

    /**
     * 获取第一级数据
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function parent()
    {
        $where = array(
            'parent_id'     => 0,
            'status'        => 1,
            'deletetime'    => 1,
        );
        $data = $this
            -> where($where)
            -> field('id,name,icon')
            -> select();
        return $data;
    }

    /**
     * 获取可用列表
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getField()
    {
        $where = array(
            'status'     => 1,
            'deletetime' => 1,
        );
        $data = $this
            -> where($where)
            -> field('id,name,parent_id')
            -> select()
            -> toArray();

        return $data;
    }
}