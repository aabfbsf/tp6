<?php


namespace app\admin\controller;


use think\facade\Session;
use app\admin\model\tp_user as UserModel;
class Hw extends Base
{
    public function index(){

        return $this->fetch();
    }

}