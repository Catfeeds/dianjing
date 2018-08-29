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


use app\user\model\UserMoneyModel;
use think\Model;

class UserCurrencyModel extends Model
{
    /**
     * 获取当前用户的金币数
     * @param $user_id
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index($user_id)
    {
        $where = array(
            'user_id'      => $user_id,
            'deletetime'   => 1,
            'currency_id'  => 2, //金币id暂时固定
        );
        $data = $this
            -> field('id,number,status')
            -> where($where)
            -> find() ;
        if ($data)
        {
            return array(
                'code' => 1,
                'data' => $data -> toArray(),
            );
        }
        else
        {
            return array(
                'code' => 0,
            );
        }
    }

    /**
     * 减少金币
     * @param $data
     * @param $number
     * @return UserCurrencyModel
     */
    public function buckle($data,$number)
    {
        $param = array(
            'id'     => $data['id'],
            'number' => bccomp($data['number'],$number),
        );
        $result =  $this -> update($param);

        if ($result)
        {
            //金币流转记录
            $data = array(
                'user_id' => session('user')['id'],
                'id'      => $data['id'],
                'number'  => $number,
                'type'    => 2,
                'test'    => '投注花费',
                'balance' => $param['number'],
            );
            (new UserMoneyModel()) -> addOne($data);
        }

        return $result;

    }

}