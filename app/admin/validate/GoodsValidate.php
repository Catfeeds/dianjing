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

class GoodsValidate extends Validate
{
    protected $rule = [
        'name'     => 'require',
        'img'      => 'require',
        'price'     => 'require',
        'currency_id'  => 'require',
    ];

    protected $message = [
        'name.require'          => '名称不能为空',
        'img.require'           => '图片不能为空',
        'price.require'         => '价格不能为空',
        'currency_id.require'   => '币值不能为空',
    ];

    protected $scene = [

    ];
}