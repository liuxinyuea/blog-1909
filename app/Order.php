<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    // 指定表名
    protected $table='order';
    protected $primaryKey='order_id';
    public $timestamps=false;
    // 黑名单
    protected $guarded=[];
}
