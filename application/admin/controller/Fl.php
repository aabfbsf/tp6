<?php


namespace app\admin\controller;


use think\Controller;
use app\admin\model\tp_shop as UserModel;
use app\admin\model\tp_user as UserModels;
class Fl extends Base
{
    public function index(){
        $a=$this->request->param();
        return json($a);
    }
}