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

class ChoiceNameModel extends  Model
{
    /**
     * 获取数据
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
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
     * 获得一级菜单
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function parent()
    {
        $where = array(
            'parent_id'     => 0,
        );

        return $this -> getField($where);
    }

    /**
     * 获取基本信息
     * @param array $where
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getField($where=array())
    {
        $where['status']     = 1;
        $where['deletetime'] = 1;

        $data = $this
            -> where($where)
            -> field('id,name,parent_id')
            -> select()
            -> toArray();
        return $data;
    }
}