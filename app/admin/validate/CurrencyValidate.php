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

class CurrencyValidate extends Validate
{
    protected $rule = [
        'title'     => 'require',
        'icon'      => 'require',
        'ratio'     => 'require',
        'ratio_id'  => 'require',
    ];

    protected $message = [
        'title.require'       => '名称不能为空',
        'icon.require'        => '图标不能为空',
        'ratio.require'       => '换算比例不能为空',
        'ratio_id.require'    => '换算比例对象不能为空',
    ];

    protected $scene = [

    ];
}