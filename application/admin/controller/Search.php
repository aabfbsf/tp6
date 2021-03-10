<?php


namespace app\admin\controller;


use think\Db;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;
use think\facade\View;
use const http\Client\Curl\FEATURES;

class Search extends Base
{
    public function index(){
        $ser=$this->request->param('val');
//            $data=Db::table('tp_shop')
//                ->where('shopname','like','%'.$ser.'%')
//                ->selectOrFail();
            $data = Db::table('tp_user u,tp_shop s')
                ->where('s.shopname', 'like', '%' . $ser . '%')
//                ->where('u.id=s.userid')
                ->field('u.username n,s.create_time t,s.shopimg i,s.shopqian q,s.shopname b,s.shopjj j,s.shopaddress a,s.shopnumber p')
                ->select();
                if(!$data){
                    return "r";
                }else{
//                    $a=[
//                        'status'=>'t',
//                        'data'=>$data
//                    ];

//                    return json($a);
//                    return view('index');
//                    dump($data);die;
                    return view('index')->assign('user',$data);
//                    return $this->fetch();
                }

    }
    public function search(){
//        $this->assign('user',$data);
        $a=$this->request->param();

        return $this->fetch("index");
    }
}