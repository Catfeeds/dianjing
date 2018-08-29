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

class MatchUserValidate extends Validate
{
    protected $rule = [
        'choice_id'  => 'require',
        'number'     => 'require|number',
    ];

    protected $message = [
        'choice_id.require' => '选择不能为空',
        'number.require'    => '数量不能为空',
        'number.number'     => '数量格式错误',
    ];
}