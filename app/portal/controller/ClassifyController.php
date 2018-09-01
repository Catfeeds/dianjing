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

use app\admin\model\ClassifyModel;
use cmf\controller\HomeBaseController;

class ClassifyController extends HomeBaseController
{
    /**
     * 选取数据
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {

        $data = (new ClassifyModel()) -> parent() -> toArray();
        $classify = session('classify');
        if ($classify)
        {
            foreach ($data as $key => $val)
            {
                $data[$key]['status'] = $classify[$val['id']];
            }
        }

        $this -> assign('classify',$data);
        return $this -> fetch();
    }

    /**
     * 保存
     */
    public function save()
    {
        if ($this -> request -> isPost())
        {
            $param = $this -> request -> param();
            if (empty($param['classify_id']))
            {
                $this -> error('缺少重要参数');
            }
            $data = array();
            foreach ($param['classify_id'] as $key => $val)
            {
                $data[$key]    = $val;
            }
            session('classify',$data);
            $this -> success('保存成功',cmf_url('Index/index'));
        }
        else
        {
            $this -> error('错误操作');
        }
    }
}