<?php


namespace app\admin\controller;


class Validate extends \think\Validate
{
    protected $rule=[
      'shopname'=>'require|max:15',
        'shopqian'=>'require|number|max:10',
        'shopaddress'=>'require',
        'shopjj'=>'require',
        'shopnumber'=>'require|number|mobile'
    ];
    protected $message=[
      'shopname.require'=>'商品标题不能为空~',
      'shopname.max'=>'商品标题最长为25~',
        'shopqian.require'=>'商品价格不能为空~',
        'shopqian.max'=>'商品价格不能超过10亿元~',
        'shopqian.number'=>'商品价格必须为数字~',
        'shopjj.require'=>'商品简介不能为空~',
        'shopnumber.require'=>'手机号不能为空~',
        'shopnumber.number'=>'手机号必须为数字~',
        'shopnumber.mobile'=>'手机号格式不正确~',
    ];
}