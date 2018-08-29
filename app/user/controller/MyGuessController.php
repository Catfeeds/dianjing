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

namespace app\user\controller;


use cmf\controller\HomeBaseController;

class MyGuessController extends HomeBaseController
{
    /**
     * 获取我的竞猜信息
     * @return mixed
     */
    public function index()
    {
        $id   = $this -> request -> param('id',0);

        $data = model('MatchUser') -> index( $id );
        $this -> assign('data',$data);
        $this -> assign('id',$id);
        $this -> assign('page',$data->render());
        return $this -> fetch();
    }
}