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

class MatchChoiceModel extends Model
{
    /**
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
            -> field('a.id,a.name,a.match_id,b.match_code,c.name as bureau_name,d.name as choice_name,e.name as parent_name,a.choice,a.odds,a.status,a.time')
            -> join('__MATCH__ b','a.match_id=b.id')
            -> join('__MATCH_BUREAU__ c','a.bureau_id=c.id')
            -> join('__CHOICE_NAME__ d','a.choice_id=d.id')
            -> join('__CHOICE_NAME__ e','d.parent_id=e.id','LEFT')
            -> where($where)
            -> order(['a.time'=>'ASC','a.status' => 'ASC'])
            -> paginate(10);
        return $data;
    }
}