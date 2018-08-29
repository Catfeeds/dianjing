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


use app\admin\model\CurrencyModel;
use cmf\controller\AdminBaseController;

class CurrencyController extends AdminBaseController
{
    private $Model;
    public function _initialize()
    {
        parent::_initialize();
        $this -> Model = model('currency');
    }


    /**
     * 币值列表
     * @adminMenu(
     *     'name'   => '币值列表',
     *     'parent' => 'admin/Currency/default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '币值列表',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        $data  = $this -> Model -> index();
        $this -> assign('data',$data);
        $this->assign('page', $data->render());
        return $this -> fetch();
    }

    /**
     * 添加虚拟币
     * @adminMenu(
     *     'name'   => '添加虚拟币',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加虚拟币',
     *     'param'  => ''
     * )
     */
    public function add()
    {
        $data = $this -> Model -> getField('id,title');
        $this -> assign('ratio_id',$data);
        return $this -> fetch();
    }

    /**
     * 添加虚拟币保存
     * @adminMenu(
     *     'name'   => '添加虚拟币保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加虚拟币保存',
     *     'param'  => ''
     * )
     */
    public function addPost()
    {
        $param         = $this -> request -> param();
        $param['time'] = time();
        $result    = $this -> Model->validate(true)->allowField(true)->save($param);
        if ($result === false) {
            $this->error($this -> Model->getError());
        }

        $this->success("添加成功！", url("currency/index"));
    }

    /**
     * 停用启用虚拟币
     * @adminMenu(
     *     'name'   => '停用启用虚拟币',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '停用启用虚拟币',
     *     'param'  => ''
     * )
     */
    public function update()
    {
        $param  = $this -> request -> param();
        $result = $this -> Model ->isUpdate(true) -> save($param);
        if ($result)
        {
            $this -> success('修改成功!');
        }
        else
        {
            $this -> error('修改失败!');
        }
    }

    /**
     * 删除虚拟币
     * @adminMenu(
     *     'name'   => '删除虚拟币',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '删除虚拟币',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        $result = $this -> Model -> save(['deletetime'=>time()],['id'=>$id]);
        if ($result)
        {
            $this -> success('删除成功!');
        }
        else
        {
            $this -> error('删除失败!');
        }
    }

    /**
     * 编辑虚拟币
     * @adminMenu(
     *     'name'   => '编辑虚拟币',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑虚拟币',
     *     'param'  => ''
     * )
     */
    public function edit()
    {
        $id     = $this -> request -> param('id', 0, 'intval');
        $data   = CurrencyModel::get($id);
        $this -> assign('data',$data);
        $ratio_id = $this -> Model -> getField('id,title');
        $this -> assign('ratio_id',$ratio_id);
        return $this -> fetch();
    }

    /**
     * 编辑虚拟币提交保存
     * @adminMenu(
     *     'name'   => '编辑虚拟币提交保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑虚拟币提交保存',
     *     'param'  => ''
     * )
     */
    public function editPost()
    {
        $data      = $this -> request -> param();
        $result    = $this -> Model
            -> validate(true)
            -> allowField(true)
            -> isUpdate(true)
            -> save($data);
        if ($result === false) {
            $this -> error($this -> Model -> getError());
        }

        $this -> success("保存成功！", url("currency/index"));
    }
}