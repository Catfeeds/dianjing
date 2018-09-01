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

namespace app\admin\validate;


use think\Validate;

class OrderValidate extends Validate
{
    protected $rule = [
        'id'               => 'require',
        'number'           => 'require',
    ];

    protected $message = [
        'id.require'       => '编号不能为空',
        'number.require'   => '数量不能为空',
    ];
}