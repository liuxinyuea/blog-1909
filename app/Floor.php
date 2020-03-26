<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    // 指定表名
    protected $table='floor';
    protected $primaryKey='id';
    public $timestamps=false;
    // 黑名单
    protected $guarded=[];
}
