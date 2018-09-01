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

class UserCurrencyModel extends Model
{
    /**
     * 获取该用户持有的币值
     * @param $user_id
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index($user_id)
    {
        $where = array(
            'user_id'       => $user_id,
            'status'        => 1,
            'deletetime'    => 1,
        );
        $result = $this -> where($where) -> count();
        if (empty($result))
        {
            $this -> start($user_id);
        }
        $data  = $this
            -> field('id,number,currency_id')
            -> where($where)
            -> select()
            -> toArray();
        return $data;
    }

    /**
     * 添加
     * @param $user_id
     */
    public function  start($user_id)
    {
        $array = array(
            'user_id'   => $user_id,
            'number'    => 0,
            'time'      => time()
        );
        $data  = model('currency') -> gitId() ;
        foreach ($data as $val)
        {
            $array['currency_id'] = $val['id'];
            $this -> insert($array);
        }

    }


    /**
     * 兑换|充值操作
     * TODO 事务操作
     * @param $data
     * @return bool|mixed
     * @throws \think\Exception
     */
    public function recharge($data)
    {

        $array = array(
            'number'        => $data['number']*(100/$data['ratio']),
            'user_id'       => $data['user_id'],
            'currency_id'   => $data['currency_id'],
        );
        switch ($data['type'])
        {
            //充值
            case 1:

                $array['id']        = $data['diamond']['id'];
                $array['balance']   = $data['diamond']['number'];
                $array['test']      = '充值';
                return $this -> increase($array);
                break;
            //兑换
            case 2:

                //增加
                $array['id']        = $data['gold']['id'];
                $array['balance']   = $data['gold']['number'];
                $array['test']      = '兑换添加';
                $result = $this -> increase($array);

                //减少
                $array['number']    = $data['number'];
                $array['id']        = $data['diamond']['id'];
                $array['balance']   = $data['diamond']['number'];
                $array['test']      = '兑换减少';
                $result = $this -> reduce($array);

                return true;
                break;
            default:
                return false;
        }
    }



    /**
     * 减少
     * @param $data
     * @throws \think\Exception
     */
    public function reduce($data)
    {
        $where = array(
            'id'     => $data['id'],
        );
        $this -> where($where) -> setDec('number',$data['number']);
        $data['type'] = 2;
        return $this -> record($data);
    }

    /**
     * 增加数目
     * @param $data
     * @throws \think\Exception
     */
    public function increase($data)
    {
        if (empty($data['id']))
        {
            $data['id'] = $this -> addOne($data);
        }
        else
        {
            $where = array(
                'id' => $data['id']
            );
            $this -> where($where) -> setInc('number',$data['number']);
        }

        $data['type'] = 1;
        return $this -> record($data);

    }

    /**
     * 添加数据
     * @param $data
     * @return mixed
     */
    public function addOne($data)
    {
        $this -> data(
            array(
                'user_id'       => $data['user_id'],
                'currency_id'   => $data['currency_id'],
                'number'        => $data['number'],
                'time'          => time(),
            )
        );
        $this -> save();
        return $this -> id;
    }

    /**
     * 添加记录
     * @param $data
     * @return mixed
     */
    public function record($data)
    {
        return model('UserMoney') -> addOne($data);
    }
}