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


use app\admin\model\MatchChoiceModel;
use tree\Tree;

class MatchChoiceController extends ClassifyBaseController
{
    public function _initialize()
    {
        parent::_initialize();
        $this -> Model = model('MatchChoice');
        $this -> time  = 'time';
        $this -> name  = 'name';
        $this -> controller  = 'MatchChoice';
        $this -> title = '竞猜列表';
        $this -> assign('controller',$this->controller);
    }

    /**
     * 竞猜列表
     * @adminMenu(
     *     'name'   => '竞猜列表',
     *     'parent' => 'admin/Match/default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '竞猜列表',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        $data = $this -> Model -> index();

        $this -> assign('data',$data);
        $this -> assign('page',$data->render());
        return $this -> fetch();
    }


    /**
     * 添加竞猜
     * @adminMenu(
     *     'name'   => '添加竞猜',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加竞猜',
     *     'param'  => ''
     * )
     */
    public function add()
    {
        //赛事列表
        $data = model('match') -> getThis();
        $this -> assign('data',$data);

        //竞猜分组
        $result   = model('ChoiceName') -> getField();
        $tree     = new Tree();
        $array    = [];
        foreach ($result as $k=>$r) {
            $array[$k]              = $r;
        }
        $str = "<option value='\$id'  >\$spacer \$name</option>";
        $tree->init($array);
        $selectCategory = $tree->getTree(0, $str);
        $this -> assign('selectCategory',$selectCategory);

        //局分组
        $bureau = model('MatchBureau') -> getField();
        $this -> assign('bureau',$bureau);


        return $this -> fetch();
    }

    /**
     * 添加竞猜保存
     * @adminMenu(
     *     'name'   => '添加竞猜保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加竞猜保存',
     *     'param'  => ''
     * )
     */
    public function addPost()
    {
        parent::addPost();
    }

    /**
     * 停用启用竞猜
     * @adminMenu(
     *     'name'   => '停用启用竞猜',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '停用启用竞猜',
     *     'param'  => ''
     * )
     */
    public function update()
    {
        return parent::update();
    }

    /**
     * 删除竞猜
     * @adminMenu(
     *     'name'   => '删除竞猜',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '删除竞猜',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        return parent::delete();
    }

    /**
     * 编辑竞猜
     * @adminMenu(
     *     'name'   => '编辑竞猜',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑竞猜',
     *     'param'  => ''
     * )
     */
    public function edit()
    {
        $id     = $this -> request -> param('id');
        if (empty($id))
        {
            $this -> error('缺少重要参数');
        }
        $choice = MatchChoiceModel::get($id) -> toArray();
        $this -> assign('choice',$choice);

        //赛事列表
        $data = model('match') -> getThis();
        $this -> assign('data',$data);

        //竞猜分组
        $result   = model('ChoiceName') -> getField();
        $tree     = new Tree();
        $array    = [];
        foreach ($result as $k=>$r) {
            $array[$k]              = $r;
            $array[$k]['selected']  = $choice['choice_id']==$r['id'] ? 'selected' : '';
        }
        $str = "<option value='\$id' \$selected >\$spacer \$name</option>";
        $tree->init($array);
        $selectCategory = $tree->getTree(0, $str);
        $this -> assign('selectCategory',$selectCategory);

        //局分组
        $bureau = model('MatchBureau') -> getField();
        $this -> assign('bureau',$bureau);


        return $this -> fetch();
    }

    /**
     * 编辑竞猜保存
     * @adminMenu(
     *     'name'   => '编辑竞猜保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑竞猜保存',
     *     'param'  => ''
     * )
     */
    public function editPost()
    {
        return parent::editPost();
    }


}