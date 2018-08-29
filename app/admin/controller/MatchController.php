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

use app\admin\model\MatchModel;
use tree\Tree;

class MatchController extends ClassifyBaseController
{
    public function _initialize()
    {
        parent::_initialize();
        $this -> Model = model('Match');
        $this -> time  = 'time';
        $this -> controller  = 'Match';
        $this -> title = '比赛信息';
    }

    /**
     * 比赛列表
     * @adminMenu(
     *     'name'   => '比赛列表',
     *     'parent' => 'admin/Match/default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '比赛列表',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        $param = $this -> request -> param();
        $where = array(
            'a.deletetime' => 1,
        );
        //战队查找
        if (!empty($param['name']))
        {
            $where['d.name|e.name'] = ['like','%'.$param['name'].'%'];
        }
        $data  = $this -> Model -> index($where);
        $this -> assign('data',$data);
        $this -> assign('page', $data->render());
        return $this -> fetch();
    }

    /**
     * 添加比赛
     * @adminMenu(
     *     'name'   => '添加比赛',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加比赛',
     *     'param'  => ''
     * )
     */
    public function add()
    {
        //赛事类型
        $result = model('Classify') -> getField();
        $tree     = new Tree();
        $array    = [];
        foreach ($result as $r) {
            $array[]       = $r;
        }
        $str = "<option value='\$id'>\$spacer \$name</option>";
        $tree->init($array);
        $selectCategory = $tree->getTree(0, $str);
        $this -> assign('selectCategory',$selectCategory);

        //盘信息
        $disc  = model('MatchDisc') -> getField();
        $this -> assign('disc',$disc);

        //战队
        $team = model('WarTeam') -> getField();
        $this -> assign('team',$team);

        return $this -> fetch();
    }

    /**
     * 添加比赛保存
     * @adminMenu(
     *     'name'   => '添加比赛保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加比赛保存',
     *     'param'  => ''
     * )
     */
    public function addPost()
    {
        $param = $this -> request -> param();
        $param['startTime']  = strtotime($param['startTime']);
        $param['match_code'] = date('YmdHis').time().mt_rand(00000,99999);
        $param[$this->time]  = time();
        $result    = $this -> Model->validate(true)->allowField(true)->save($param);
        if ($result === false) {
            $this->error($this -> Model->getError());
        }
        $this -> success('添加成功',url($this->controller."/index"));
    }

    /**
     * 停用启用比赛
     * @adminMenu(
     *     'name'   => '停用启用比赛',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '停用启用比赛',
     *     'param'  => ''
     * )
     */
    public function update()
    {
        return parent::update();
    }

    /**
     * 删除比赛
     * @adminMenu(
     *     'name'   => '删除比赛',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '删除比赛',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        return parent::delete();
    }

    /**
     * 编辑比赛
     * @adminMenu(
     *     'name'   => '编辑比赛',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑比赛',
     *     'param'  => ''
     * )
     */
    public function edit()
    {
        $id     = $this -> request -> param('id', 0, 'intval');
        $data   = MatchModel::get($id) -> toArray();

        $this -> assign('data',$data);

        //赛事类型
        $result = model('Classify') -> getField();
        $tree     = new Tree();
        $array    = [];
        foreach ($result as $k=>$r) {
            $array[$k]              = $r;
            $array[$k]['selected']  = $data['classify_id']=$r['id'] ? 'selected' : '';
        }
        $str = "<option value='\$id' \$selected >\$spacer \$name</option>";
        $tree->init($array);
        $selectCategory = $tree->getTree(0, $str);
        $this -> assign('selectCategory',$selectCategory);

        //盘信息
        $disc  = model('MatchDisc') -> getField();
        $this -> assign('disc',$disc);

        //战队
        $team = model('WarTeam') -> getField();
        $this -> assign('team',$team);

        return $this -> fetch();
    }

    /**
     * 编辑比赛保存
     * @adminMenu(
     *     'name'   => '编辑比赛保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑比赛保存',
     *     'param'  => ''
     * )
     */
    public function editPost()
    {
        return parent::editPost();
    }
}