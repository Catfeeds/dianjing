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



use app\admin\model\WarTeamModel;

class WarTeamController extends ClassifyBaseController
{

    public function _initialize()
    {
        parent::_initialize();
        $this -> Model = model('WarTeam');
        $this -> time  = 'time';
        $this -> name  = 'name';
        $this -> controller  = 'WarTeam';
        $this -> title = '战队信息';
    }

    /**
     * 战队列表
     * @adminMenu(
     *     'name'   => '战队列表',
     *     'parent' => 'admin/Match/default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '战队列表',
     *     'param'  => ''
     * )
     */
    public function index()
    {

        return parent::index();
    }

    /**
     * 添加战队
     * @adminMenu(
     *     'name'   => '添加战队',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加战队',
     *     'param'  => ''
     * )
     */
    public function add()
    {
        return $this -> fetch();
    }

    /**
     * 添加战队保存
     * @adminMenu(
     *     'name'   => '添加战队保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加战队保存',
     *     'param'  => ''
     * )
     */
    public function addPost()
    {
        return parent::addPost();
    }

    /**
     * 停用启用战队
     * @adminMenu(
     *     'name'   => '停用启用战队',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '停用启用战队',
     *     'param'  => ''
     * )
     */
    public function update()
    {
        return parent::update();
    }

    /**
     * 删除战队
     * @adminMenu(
     *     'name'   => '删除战队',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '删除战队',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        return parent::delete();
    }

    /**
     * 编辑商品
     * @adminMenu(
     *     'name'   => '编辑商品',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑商品',
     *     'param'  => ''
     * )
     */
    public function edit()
    {
        $id     = $this -> request -> param('id', 0, 'intval');
        $data   = WarTeamModel::get($id);
        $this -> assign('data',$data);
        return $this -> fetch();
    }

    /**
     * 编辑战队保存
     * @adminMenu(
     *     'name'   => '编辑战队保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑战队保存',
     *     'param'  => ''
     * )
     */
    public function editPost()
    {
        return parent::editPost();
    }
}