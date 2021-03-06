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


use tree\Tree;

class ChoiceNameController extends ClassifyBaseController
{
    public function _initialize()
    {
        parent::_initialize();
        $this -> Model = model('ChoiceName');
        $this -> time  = 'time';
        $this -> name  = 'name';
        $this -> controller  = 'ChoiceName';
        $this -> title = '竞猜名称';
    }

    /**
     * 竞猜名称
     * @adminMenu(
     *     'name'   => '竞猜名称',
     *     'parent' => 'admin/Classify/default',
     *     'display'=> true,
     *     'hasView'=> true,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '竞猜名称',
     *     'param'  => ''
     * )
     */
    public function index()
    {
        $this -> assign('controller',$this->controller);
        $this -> assign('title',$this->title);

        $parent = $this -> Model -> parent();
        $this -> assign('parent',$parent);

        $result     = $this -> Model -> index();
        $tree       = new Tree();
        $tree->icon = ['&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ '];
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';

        $newMenus = [];
        foreach ($result as $m) {
            $newMenus[$m['id']] = $m;
        }
        foreach ($result as $key => $value) {

            $result[$key]['parent_id_node'] = ($value['parent_id']) ? ' class="child-of-node-' . $value['parent_id'] . '"' : '';
            $result[$key]['style']          = empty($value['parent_id']) ? '' : 'display:none;';
            $result[$key]['str_manage']     = '<a class="js-ajax-dialog-btn"
                                           data-msg="你确定要'.lang($value['status']==1?'DISABLED':'ENABLED').'"
                                           href="'.cmf_url($this->controller.'/update',array('id'=>$value['id'],'status'=>($value['status']==1 ? 2 : 1))).'">'.lang($value['status']==1?'DISABLED':'ENABLED').'</a>
                                            <a href="javaScript:" name="change">' . lang('EDIT') . '</a> 
                                           <a class="js-ajax-delete" href="' . url($this -> controller."/delete", ["id" => $value['id'], "menu_id" => $this->request->param("menu_id")]) . '">' . lang('DELETE') . '</a> ';
            $result[$key]['status']         = $value['status']==1 ? lang('DISPLAY') : lang('HIDDEN');
            $result[$key]['time']           = date('Y-m-d H:i:s',$value['time']);
        }

        $tree->init($result);
        $str      = "<tr id='node-\$id' \$parent_id_node style='\$style'>
                        <td style='padding-left:20px;'><input name='list_orders[\$id]' type='text' size='3' value='\$list_order' class='input input-order'></td>
                        <td>\$id</td>
                        <td>\$spacer\$name</td>	                        
                        <td>\$time</td>	                        
                        <td>\$status</td>
                        <td>\$str_manage</td>
                        <input type='hidden' value='\$id' ><input type='hidden' value='\$parent_id' >
                    </tr>";
        $category = $tree->getTree(0, $str);
        $this->assign("category", $category);
        return $this->fetch();
    }

    /**
     * 添加竞猜名称保存
     * @adminMenu(
     *     'name'   => '添加竞猜名称保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '添加竞猜名称保存',
     *     'param'  => ''
     * )
     */
    public function addPost()
    {
        return parent::addPost();
    }

    /**
     * 停用启用竞猜名称
     * @adminMenu(
     *     'name'   => '停用启用竞猜名称',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '停用启用竞猜名称',
     *     'param'  => ''
     * )
     */
    public function update()
    {
        return parent::update();
    }

    /**
     * 删除竞猜名称
     * @adminMenu(
     *     'name'   => '删除竞猜名称',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '删除竞猜名称',
     *     'param'  => ''
     * )
     */
    public function delete()
    {
        return parent::delete();
    }

    /**
     * 编辑竞猜名称保存
     * @adminMenu(
     *     'name'   => '编辑竞猜名称保存',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '编辑竞猜名称保存',
     *     'param'  => ''
     * )
     */
    public function editPost()
    {
        return parent::editPost();
    }

    /**
     * 排序
     * @adminMenu(
     *     'name'   => '排序',
     *     'parent' => 'index',
     *     'display'=> false,
     *     'hasView'=> false,
     *     'order'  => 10000,
     *     'icon'   => '',
     *     'remark' => '排序',
     *     'param'  => ''
     * )
     */
    public function sort(){
        if($this->request->isPost()){
            $data = $this->request->param();
            if(!empty($data['list_orders'])){
                foreach ($data['list_orders'] as $key=>$val){
                    $new=array(
                        'id'          => $key,
                        'list_order' => $val
                    );
                    $this -> Model ->update($new);
                }
                $this->success('排列成功');
            }
        }else{
            $this->error('错误操作');
        }
    }
}