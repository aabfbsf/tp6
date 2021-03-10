<?php


namespace app\login\model;


use think\Model;
use think\model\concern\SoftDelete;

class tp_user extends Model
{
    protected $table='tp_user';
    protected $createTime='create_time';
    protected $updateTime='update_time';
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    public function add(){

    }
}