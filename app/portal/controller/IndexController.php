<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\controller;

use cmf\controller\HomeBaseController;

class IndexController extends HomeBaseController
{
    /**
     * 首页
     * @return mixed
     */
    public function index()
    {

        $type = $this -> request -> param('type',0);

        $data = model('match') -> index($type);

        $this -> assign('type',$type);
        $this -> assign('data',$data);
        $this -> assign('page',$data->render());
        return $this->fetch();
    }



}
