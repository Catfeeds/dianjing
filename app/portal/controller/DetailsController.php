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

namespace app\portal\controller;


use app\portal\model\MatchUserModel;
use cmf\controller\HomeBaseController;

class DetailsController extends HomeBaseController
{
    /**
     * 竞猜数据
     * @return mixed
     */
    public function index()
    {
        $id           = $this -> request -> param('id',0);
        $bureau_id    = $this -> request -> param('bureau_id',1);
        if (empty($id))
        {
            $this->redirect('index/index');
        }
        $data  = model('Match') -> witchOne($id);
        $this -> assign('match',$data);

        $choice = model('MatchChoice') -> index($id,$bureau_id);
//        dump($choice);exit;
        $this -> assign('choice',$choice);

        return $this -> fetch();
    }



    /**
     * todo 事物操作
     * 保存投标信息
     */
    public function save()
    {
        if ($this -> request -> isPost())
        {
            $param            = $this -> request -> param();
            $user_id = session('user')['id'];
            //用户是否登录
            if (empty($user_id))
            {
                $this -> redirect('user/Login/index');
            }
            //验证
            $result = $this -> validate($param,'MatchUser');
            if ($result !== true) {
                $this->error($result);
            }
            //查询用户金币余额
            $result = $this -> enough($user_id,$param['number']);
            if ($result['code']==0)
            {
                $this -> error($result['msg']);
            }
            //扣除金币金额

            $rest = model('UserCurrency') -> buckle($result['data'],$param['number']);

            if (!$rest)
            {
                $this -> error('扣除失败',cmf_url('index/index'));
            }

            //保存购买记录

            $param['time']    = time();
            $param['user_id'] = $user_id;
            $MatchUser = new MatchUserModel();
            $result    = $MatchUser  -> save($param) ;

            if ($result)
            {
                $this -> success('投注成功',cmf_url('user/MyGuess/index'));
            }
            else
            {


                $this -> error('投注失败',cmf_url('index/index'));
            }

        }
        else
        {
            $this -> error('错误操作',cmf_url('index/index'));
        }
    }

    /**
     * 判断用余额是否足够
     * @param $user_id
     * @param $number
     * @return mixed
     */
    protected function enough($user_id,$number)
    {
        $data = model('UserCurrency') -> index($user_id);
        switch ($data['code'])
        {
            case 0:
                $data['msg'] = '您的余额不足';
                break;
            default:
                $array = $data['data'];
                switch ($array['status'])
                {
                    case 2:
                        $data['code'] = 0;
                        $data['msg']  = '您的账号已被冻结';
                        break;
                    default:
                        if ($array['number']<$number)
                        {
                            $data['code'] = 0;
                            $data['msg']  = '您的余额不足';
                        }
                }
        }
        return $data;
    }

}