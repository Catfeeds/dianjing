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

class OrderValidate extends Validate
{
    protected $rule = [
        'price'         => 'require',
        'phone'         => 'require',
        'qq'            => 'require',
        'goods_id'      => 'require|number',
        'number'        => 'require|number',
    ];
    protected $message = [
        'price.require'     => '价格不能为空!',
        'phone.require'     => '手机号码不能为空!',
        'qq.require'        => 'QQ号码不能为空!',
        'goods_id.require'  => '商品id不能为空!',
        'number.require'    => '数量不能为空!',
        'number.number'     => '数量格式不正确!',
        'goods_id.number'   => '商品id格式不正确!',
    ];
}