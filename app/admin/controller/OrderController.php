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

namespace app\admin\controller;

use think\Db;

class OrderController extends ClassifyBaseController
{

    public function _initialize()
    {
        parent::_initialize();
        $this -> Model = model('order');
        $this -> controller = 'Order';

        $this -> assign('controller',$this->controller);
    }

    /**
     * 订单列表
     * @adminMenu(
     *     'name'   => '订单列表',
     *     'parent' => 'admin/Goods/default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '订单列表',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        $param = $this -> request -> param();

        $data  = $this -> Model -> index();
        $data -> appends($param);
        $this -> assign('data',$data);
        $this -> assign('page',$data->render());
        return $this -> fetch();
    }


    /**
     * 修改订单状态
     * @adminMenu(
     *     'name'   => '修改订单状态',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '修改订单状态',
     *     'param'  => ''
     * )
     */
    public function update()
    {
        return parent::update();
    }

    /**
     * 删除订单
     * @adminMenu(
     *     'name'   => '删除订单',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '删除订单',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        return parent::delete();
    }

    /**
     * 发货
     * @adminMenu(
     *     'name'   => '发货',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '发货',
     *     'param'  => ''
     * )
     */
    public function delivery()
    {
        //事务操作
        $result = Db::transaction(function (){
            $id = $this -> request -> param('id');
            $this -> Model -> delivery($id);
        });
        if ($result)
        {
            $this -> success('修改成功',cmf_url('idnex/index'));
        }
        else
        {
            $this -> error('修改失败',cmf_url('idnex/index'));
        }
    }

    /**
     * 编辑订单
     * @adminMenu(
     *     'name'   => '编辑订单',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑订单',
     *     'param'  => ''
     * )
     */
    public function edit()
    {
        $id    = $this -> request -> param('id');

        $data  = $this -> Model ->  thisOne($id);
        if (empty($data))
        {
            $this -> error('未找到改数据');
        }
        $this -> assign('data',$data);
        return $this -> fetch();
    }

    /**
     * 编辑订单保存
     * @adminMenu(
     *     'name'   => '编辑订单保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑订单保存',
     *     'param'  => ''
     * )
     */
    public function editPost()
    {
        return parent::editPost();
    }



}