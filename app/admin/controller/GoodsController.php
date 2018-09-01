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



use app\admin\model\GoodsModel;
use cmf\controller\AdminBaseController;

class GoodsController extends AdminBaseController
{
    private $Model;
    public function _initialize()
    {
        parent::_initialize();
        $this -> Model = model('goods');
    }


    /**
     * 商品列表
     * @adminMenu(
     *     'name'   => '商品列表',
     *     'parent' => 'admin/Goods/default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '商品列表',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        $param = $this -> request -> param();
        $where = [
            'a.deletetime' => 1,//删除标识
        ];
        if (!empty($param['name']))
        {
            $where['name'] = ['like','%'.$param['name'].'%'];
        }

        $data  = $this -> Model -> index($where);
        $this -> assign('data',$data);
        // 在 render 前，使用appends方法保持分页条件
        $data->appends($param);

        $this->assign('page', $data->render());//单独提取分页出来
        return $this -> fetch();
    }

    /**
     * 添加商品
     * @adminMenu(
     *     'name'   => '添加商品',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加商品',
     *     'param'  => ''
     * )
     */
    public function add()
    {
        $model = model('currency');
        $data = $model -> getField('id,title');
        $this -> assign('ratio_id',$data);
        return $this -> fetch();
    }

    /**
     * 添加商品保存
     * @adminMenu(
     *     'name'   => '添加商品保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加商品保存',
     *     'param'  => ''
     * )
     */
    public function addPost()
    {
        $param         = $this -> request -> param();
        $param['time'] = time();
        $result    = $this
            -> Model
            -> validate(true)
            -> allowField(true)
            -> save($param);
        if ($result === false) {
            $this->error($this -> Model->getError());
        }

        $this->success("添加成功！", url("goods/index"));
    }

    /**
     * 停用启用商品
     * @adminMenu(
     *     'name'   => '停用启用商品',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '停用启用商品',
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
     * 删除商品
     * @adminMenu(
     *     'name'   => '删除商品',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '删除商品',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        $result = $this -> Model -> save(['deletetime'=>time()],['id'=>$id]);
        if ($result)
        {
            $name = $this -> Model -> where(['id'=>$id]) -> field('name') -> find();
            RecycleBinController::addOne($id,'goods',$name['name']);
            $this -> success('删除成功!');
        }
        else
        {
            $this -> error('删除失败!');
        }
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
        $data   = GoodsModel::get($id);
        $this -> assign('data',$data);
        $model    = model('currency');
        $ratio_id = $model -> getField('id,title');
        $this -> assign('ratio_id',$ratio_id);
        return $this -> fetch();
    }

    /**
     * 编辑商品提交保存
     * @adminMenu(
     *     'name'   => '编辑商品提交保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑商品提交保存',
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

        $this -> success("保存成功！", url("goods/index"));
    }
}