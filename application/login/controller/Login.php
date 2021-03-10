<?php

namespace app\login\controller;
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET, POST, PATCH, PUT, DELETE');
header('Access-Control-Allow-Headers:Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodifi-Since, X-Requested-With');
use think\Controller;
use think\Db;
use app\login\model\tp_user as UserModel;
use think\facade\Session;
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET, POST, PATCH, PUT, DELETE');
header('Access-Control-Allow-Headers:Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodifi-Since, X-Requested-With');
class Login extends Controller
{
    public function index()
    {

        return $this->fetch();
    }
    public function login(){

       $data=$this->request->param();
       $val=new Validate();
       if(!$val->check($data)){
           return json($val->getError());
       }else {
           $u=$data['username'];
           $a=(UserModel::where('username','=',$u)->select());
//           return json(UserModel::where('username','=',$u)->select());
//           return json(count($a));die;
          if(count($a)){
               return 'ycz';
           }else if(!(count($a))){
           UserModel::create($data);
           $user = UserModel::getByUsername($data['username']);
           Session::set('uid', $user['id']);
           return 'url';
                }
             }
        }
        public function zc(){
            return $this->fetch();
        }
        public function zcs(){
            $un=$this->request->param('username');
            $ps=$this->request->param('password');
            $a=Db::name('user')->where('username','=',$un)->select();
            $b=Db::name('user')->where('username','=',$un)->where('password','=',$ps)->select();
            if(!$a){
                return ('us');
            }else if(!$b){
                return ('ps');
            }else{
                Session::set('uid',$b[0]['id']);
                return ("ls");
            }
        }


}
