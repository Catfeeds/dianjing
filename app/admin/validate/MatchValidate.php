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

class MatchValidate extends Validate
{
    protected $rule = [
        'classify_id'       => 'require',
        'disc_id'           => 'require',
        'warA'              => 'require',
        'warB'              => 'require',
        'startTime'       => 'require',
    ];

    protected $message = [
        'classify_id.require'       => '赛事类型不能为空',
        'disc_id.require'           => '盘类型不能为空',
        'warA.require'              => '甲方不能为空',
        'warB.require'              => '乙方不能为空',
        'startTime.require'         => '开赛时间不能为空',
    ];
}