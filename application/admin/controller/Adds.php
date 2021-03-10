<?php


namespace app\admin\controller;


use think\Db;
use think\facade\Session;
use app\admin\model\tp_shop as UserModel;
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET, POST, PATCH, PUT, DELETE');
header('Access-Control-Allow-Headers:Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodifi-Since, X-Requested-With');
class Adds extends Base
{
    public function index(){
        return $this->fetch();
    }
    public function texts(){
        $u=$this->request->param();
        $val=new Validate();
        if(!$val->check($u)){
            return json($val->getError());
        }else{
            $datas=[
                'shopname'=>$u['shopname'],
                'shopqian'=>$u['shopqian'],
                'shopjj'=>$u['shopjj'],
                'shopnumber'=>$u['shopnumber'],
                'userid'=>Session::get('uid'),
            ];
            $a=UserModel::create($datas);

            return json($a);

//           if($us->save()){
//            echo "发布成功！";
//           }else{
//               echo "发布失败!";
//           }
        }
    }
    public function img(){
        $s1=$this->request->param('shopname');
        $s2=$this->request->param('shopnumber');
        $s3=$this->request->param('shopqian');
        $s4=$this->request->param('shopjj');
        $s5=$this->request->param('shopaddress');
        $s6=$this->request->file('image');
        $info=$s6->validate(['ext'=>'jpg,png,gif'])-> move('./static/uploads/images');
        $img_url='/static/uploads/images/'.$info->getSaveName();
        $data=[
            'shopname'=>$s1,
            'shopnumber'=>$s2,
            'shopqian'=>$s3,
            'shopjj'=>$s4,
            'shopaddress'=>$s5,
            'shopimg'=>$img_url,
            'userid'=>Session::get('uid'),
        ];
        $val=new Validate();
        if(!$val->check($data)){
            return $this->error($val->getError(),'admin/Adds/index','','3');
        }else{
            $rel=UserModel::create($data);
            if($rel){
                return $this->success("发布成功",'admin/Index/index','','3');
            }
        }
    }
}