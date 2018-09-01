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

namespace app\user\validate;


use think\Validate;

class RechargeValidate extends Validate
{
    protected $rule = [
        'type'        => 'require',
        'number'      => 'require',
    ];
    protected $message = [
        'type.require'     => '类型不能为空!',
        'number.require'   => '数量不能为空!',
    ];
}