<?php
namespace app\controller;

use app\BaseController;
use think\facade\Db;
use think\facade\View;

class Index extends BaseController
{
    public function index(){
//        dump(Db::name('user')->select());
        return View::fetch();
    }
}
