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


class MatchBureauController extends ClassifyBaseController
{
    public function _initialize()
    {
        parent::_initialize();
        $this -> Model = model('MatchBureau');
        $this -> time  = 'time';
        $this -> name  = 'name';
        $this -> controller  = 'MatchBureau';
        $this -> title = '局名称';
    }

    /**
     * 局名称
     * @adminMenu(
     *     'name'   => '局名称',
     *     'parent' => 'admin/Classify/default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '局名称',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        return parent::index();
    }

    /**
     * 添加局名称保存
     * @adminMenu(
     *     'name'   => '添加局名称保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加局名称保存',
     *     'param'  => ''
     * )
     */
    public function addPost()
    {
        return parent::addPost();
    }

    /**
     * 停用启用局名称
     * @adminMenu(
     *     'name'   => '停用启用局名称',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '停用启用局名称',
     *     'param'  => ''
     * )
     */
    public function update()
    {
        return parent::update();
    }

    /**
     * 删除局名称
     * @adminMenu(
     *     'name'   => '删除局名称',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '删除局名称',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        return parent::delete();
    }

    /**
     * 编辑局名称保存
     * @adminMenu(
     *     'name'   => '编辑局名称保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑盘分类保存',
     *     'param'  => ''
     * )
     */
    public function editPost()
    {
        return parent::editPost();
    }
}