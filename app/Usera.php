<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usera extends Model
{
    // 指定表名
    protected $table='usera';
    protected $primaryKey='user_id';
    public $timestamps=false;
    // 黑名单
    protected $guarded=[];
}
