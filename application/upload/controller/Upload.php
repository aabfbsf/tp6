<?php

namespace app\upload\controller;
use think\Controller;
use think\Db;
use think\facade\Session;
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET, POST, PATCH, PUT, DELETE');
header('Access-Control-Allow-Headers:Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodifi-Since, X-Requested-With');
class Upload extends Controller
{

        public function upload(){
//            $a=$this->request->param();
//            return json($a);
            $info=Session::get('uid');
            $user_agent=$info;
            $file=$this->request->file('image');
            $info=$file->validate(['ext'=>'jpg,png,gif'])-> move('./static/uploads/images');

            if($info){
                $img_url='/static/uploads/images/'.$info->getSaveName();

                $rel=Db::name('user')
                    ->where('id',$user_agent)
                    ->update(['img'=>$img_url]);

                $result='';
                $msg='';
                if(!empty($rel)){
                     $this->success('上传成功~','admin/My/index','','1');
                }else{
                    $msg='图片上传失败!你未登录或者网络异常';
                }

                $list=[
                    'code'=>200,
                    'result'=>$result,
                    'error_msg'=>$msg
                ];
            }else{
                $list=[
                    'code'=>200,
                    'result'=>'图片上传失败',
                    'error_msg'=>'图片格式应该为jpg,png'
                ];
            }
    }
}