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

class CurrencyModel extends Model
{
    /**
     * @param $id
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index($id)
    {
        $where = array(
            'a.status'      => 1,
            'a.id'          => $id,
            'a.deletetime'  => 1,
        );
        switch ($id)
        {
            case 1:

                break;
            default:
                $this -> field('b.title as Btitle,b.icon as Bicon')
                    -> join('__CURRENCY__ b','a.ratio_id=b.id');
        }
        $data = $this
            -> field('a.title,a.icon,a.ratio,a.ratio_id,a.grade')
            -> alias('a')
            -> where($where)
            -> find()
            -> toArray();
        $data['grade'] = explode(',',$data['grade']);
        return $data;
    }

    /**
     * 获取可用id
     * @return array
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function gitId()
    {
        $where = array(
            'status'     => 1,
            'deletetime' => 1,
        );
        $data = $this
            -> field('id')
            -> where($where)
            -> select()
            -> toArray();
        return $data;
    }
}