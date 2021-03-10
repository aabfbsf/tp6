<?php

namespace app\login\controller;

use think\Controller;
use think\Request;

class Validate extends \think\Validate
{
    protected $rule=[
      'username'    =>'require|max:10',
      'password'    =>'require|min:5|max:12',

    ];
    protected $message=[
        'username.require'=>'用户名不能为空~',
        'username.max'=>'用户名最大长度不能超过10',
        'password.require'=>'密码不能为空',
        'password.min'=>'密码长度必须超过5',
        'password.max'=>'密码长度最大为12',
    ];
    protected  $scene=[
        'login'=>['username','password'],
    ];
}
