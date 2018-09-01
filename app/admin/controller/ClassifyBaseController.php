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


use cmf\controller\AdminBaseController;

class ClassifyBaseController extends AdminBaseController
{
    protected $title = '';
    protected $Model;
    protected $time = 'time';
    protected $name = 'name';
    protected $controller = 'Classify';


    public function index()
    {
        $param = $this -> request -> param();
        $where = array(
            'deletetime' => 1,
        );
        if (!empty($param['name']))
        {
            $where[$this->name] = ['like',"%{$param['name']}%"];
        }
        $data  = $this -> Model -> index($where);
        $this -> assign('data',$data);
        $this -> assign('controller',$this->controller);
        $this -> assign('title',$this->title);
        $this -> assign('page', $data->render());
        return $this -> fetch();
    }


    public function addPost()
    {
        $param = $this -> request -> param();
        $param[$this->time] = time();
        $result    = $this -> Model->validate(true)->allowField(true)->save($param);
        if ($result === false) {
            $this->error($this -> Model->getError());
        }
        $this -> success('添加成功',url($this->controller."/index"));
    }


    public function update()
    {
        $param  = $this -> request -> param();
        $result = $this -> Model ->isUpdate(true) -> save($param);
        if ($result)
        {
            $this -> success('修改成功!',url($this->controller."/index"));
        }
        else
        {
            $this -> error('修改失败!');
        }
    }


    public function delete()
    {
        $id = $this->request->param('id', 0, 'intval');
        $result = $this -> Model -> save(['deletetime'=>2],['id'=>$id]);
        if ($result)
        {
            $table_name = strtolower(preg_replace('/(?<=[a-z])([A-Z])/', '_$1', $this->controller));
            RecycleBinController::addOne($id,$table_name,$this->title);
            $this -> success('删除成功!',url($this->controller."/index"));
        }
        else
        {
            $this -> error('删除失败!');
        }
    }


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

        $this -> success("保存成功！",url($this->controller."/index"));
    }
}