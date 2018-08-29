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

class MatchModel extends Model
{
    /**
     * 获取比赛记录
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function index($type)
    {

        $where = array(
            'a.deletetime'  => 1,
            'a.status'      => ['neq',3],
        );
        switch ($type)
        {
            case 0:

                break;
            default:
                $where['b.id'] = $type;
        }

        $data  = $this
            -> field('a.id,a.startTime,a.is_live,a.bet_num,a.url_status,b.icon as Cicon,b.name as classify,c.name as disc,d.name as Aname,d.icon as Aicon,e.name as Bname,e.icon as Bicon')
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
     * 获取当前的信息
     * @param $id
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function witchOne($id)
    {
        $where = array(
            'a.id' => $id,
            'a.deletetime'  => 1,
            'a.status'      => ['neq',3],
        );
        $data  = $this
            -> field('a.id,a.startTime,a.is_live,a.status,a.bet_num,a.url_status,b.icon as Cicon,b.name as classify,c.name as disc,d.name as Aname,d.icon as Aicon,e.name as Bname,e.icon as Bicon')
            -> alias('a')
            -> join('__CLASSIFY__ b','a.classify_id=b.id')
            -> join('__MATCH_DISC__ c','a.disc_id=c.id')
            -> join('__WAR_TEAM__ d','a.warA=d.id')
            -> join('__WAR_TEAM__ e','a.warB=e.id')
            -> where($where)
            -> find()
            -> toArray();
        return $data;
    }
}