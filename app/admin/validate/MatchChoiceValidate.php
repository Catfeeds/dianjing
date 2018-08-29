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

class MatchChoiceValidate extends Validate
{
    protected $rule = [
        'match_id'          => 'require',
        'choice_id'         => 'require',
        'bureau_id'         => 'require',
        'odds'              => 'require|float',
    ];

    protected $message = [
        'match_id.require'      => '比赛不能为空',
        'choice_id.require'     => '竞猜选项不能为空',
        'bureau_id.require'     => '局不能为空',
        'odds.require'          => '赔率不能为空',
        'odds.float'            => '赔率类型错误',
    ];
}