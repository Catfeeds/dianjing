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

class MatchModel extends Model
{
    /**
     * 获取分页数据
     * @param $where
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function index($where)
    {
        $data = $this
            -> field('a.id,a.is_live,a.url_status,a.bet_num,a.match_code,a.startTime,a.status,b.name as classify,c.name as disc,d.name as Aname,d.icon as Aicon,e.name as Bname,e.icon as Bicon')
            -> alias('a')
            -> join('__CLASSIFY__ b','a.classify_id=b.id')
            -> join('__MATCH_DISC__ c','a.disc_id=c.id')
            -> join('__WAR_TEAM__ d','a.warA=d.id')
            -> join('__WAR_TEAM__ e','a.warB=e.id')
            -> where($where)
            -> paginate(10);
        return $data;
    }

    /**
     * 获取可用调用的数据
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getThis()
    {
        $where = array(
            'status' => 1,
            'deletetime' => 1,
        );
        $data  = $this
            -> field('id,match_code')
            -> where($where)
            -> select()
            -> toArray();
        return $data;
    }
}