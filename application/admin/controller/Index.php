<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\facade\Session;
use think\facade\View;
use think\Request;
use app\admin\model\tp_user as UserModel;
use app\admin\model\tp_shop as UserModels;
class Index extends Base
{
    public function index()
    {
          $userinfo2=UserModels::select();
//          $user=Db::name('user')->where('id','=',$userinfo2[0]['userid'])->field()->select();
////          $this->assign('pas',$user);
//        $data=['user'=>$user,'user2'=>$userinfo2];
//       $data= Db::table('tp_shop s,tp_user u')
//           ->order('s.id','desc')
////            ->where('s.userid=u.id')
//               ->where('s.id',">",'0')
//            ->field('s.id sid,s.shopqian sqian,s.shopimg sig,u.username uname,
//           s.shopjj sjj
//            ')->select();
//        $data=Db::table('tp_shop')
//            ->order('id','desc')
//            ->select();
//            for($b=0;$b<count($a);$b++){
//         dump($a[$b]['userid']);
//            }
//        $data=["a"=>$a,'b'=>'$b'];
//        dump($data);die;

       $data= Db::table('tp_user u,tp_shop s')
            ->where('u.id=s.userid')
            ->field('u.username n,s.create_time t,s.shopimg i,s.shopqian q,s.shopname b,s.shopjj j,s.shopaddress a,s.shopnumber p')
            ->select();




        $b=$this->assign('user',$data);


        return $this->fetch();
    }
    public function searchs(){
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
//            return json($data);die;
//            return \view("admin\Index\index")->assign('user',$data);
//            return view();
        }
    }
}
