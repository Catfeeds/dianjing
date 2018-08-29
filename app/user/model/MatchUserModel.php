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

class MatchUserModel extends Model
{
    /**
     * 获取我的竞猜信息
     * @param int $status
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function index($status=0)
    {
       $where = array(
           'a.user_id'  => session('user')['id'],
           'a.deletime' => 1,
       );
       switch ($status)
       {
           case 0:

               break;
           default:
               $where['a.status'] = $status;
       }

       $data = $this
           -> field('a.id,a.time,a.number,b.odds,a.status,d.name as Aname,e.name as Bname,c.startTime,f.name as classify_name,g.name as bureau_name,h.name as choice_name,i.name as choice_parent_name,b.name as choice_a')
           -> alias('a')
           -> join('__MATCH_CHOICE__ b','a.choice_id=b.id')
           -> join('__MATCH__ c','b.match_id=c.id')
           -> join('__WAR_TEAM__ d','c.warA=d.id')
           -> join('__WAR_TEAM__ e','c.warB=e.id')
           -> join('__CLASSIFY__ f','c.classify_id=f.id')
           -> join('__MATCH_BUREAU__ g','b.bureau_id=g.id')
           -> join('__CHOICE_NAME__ h','b.choice_id=h.id')
           -> join('__CHOICE_NAME__ i','h.parent_id=i.id','LEFT')
           -> where($where)
           -> paginate(10);

       return $data;
    }



}