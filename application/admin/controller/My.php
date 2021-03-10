<?php


namespace app\admin\controller;


use app\admin\model\tp_user as UserModel;
use think\facade\Session;

class My extends Base
{
    public function index(){
        $uid=Session::get('uid');
        $userinfo=UserModel::find($uid);
        $this->assign('user',$userinfo);
        return $this->fetch();
    }
    public function zx(){
        Session::clear();
        return 'success';
    }

}