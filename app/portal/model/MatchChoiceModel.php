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

namespace app\portal\model;


use think\Model;

class MatchChoiceModel extends Model
{
    /**
     * 获取对应数据
     * @param $match_id
     * @param int $bureau_id
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index($match_id,$bureau_id=0)
    {
        $data['bureau_id'] = $bureau_id;
        $where  = array(
            'a.match_id'      => $match_id,
            'a.status'        => 1,
            'a.deletetime'    => 1,
        );
        $data['bureau'] = $this -> bureau($where);

        $where['a.bureau_id'] =$bureau_id;

        $data['choice'] = $this -> choice($where);

        return $data;
    }

    /**
     * 获取当前打局信息
     * @param $where
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function bureau($where)
    {
        $data = $this
            -> field('a.bureau_id,b.name')
            -> alias('a')
            -> join('__MATCH_BUREAU__ b','a.bureau_id=b.id')
            -> where($where)
            -> group('a.bureau_id')
            -> select()
            -> toArray();
        return $data;
    }

    /**
     * 获取当前竞猜选项
     * @param $where
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function choice($where)
    {
        $data = $this
            -> alias('a')
            -> field('a.id,a.name,d.name as choice_name,e.name as parent_name,a.odds,d.parent_id')
            -> join('__CHOICE_NAME__ d','a.choice_id=d.id')
            -> join('__CHOICE_NAME__ e','d.parent_id=e.id','LEFT')
            -> where($where)
            -> select()
            -> toArray();
        $array = [];
        foreach ($data as $key => $val)
        {
            $array[$val['parent_id']]['parent_id']   = $val['parent_id'];
            $array[$val['parent_id']]['parent_name'] = $val['parent_name'];
            $array[$val['parent_id']]['data'][]      = $val;
        }

        return $array;
    }
}