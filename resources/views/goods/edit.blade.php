<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品修改</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品修改<a style="float:right" href="{{url('/goods/update')}}" class="btn btn-default">列表</a></h2></center><hr/>
<form action="{{url('/goods/update/'.$goods->goods_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_name" placeholder="请输入商品名称" value="{{$goods->goods_name}}">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品货号</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_size" placeholder="请输入商品货号" value="{{$goods->goods_size}}">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_price" placeholder="请输入商品价格" value="{{$goods->goods_price}}">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">库存</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_num" placeholder="请输入库存" value="{{$goods->goods_num}}">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-8">
			<input type="radio" name="is_show" value="是" checked>是
			<input type="radio" name="is_show" value="否">否
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-8">
			<input type="radio" name="is_new" value="是" checked>是
			<input type="radio" name="is_new" value="否">否
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-8">
			<input type="radio" name="is_best" value="是" checked>是
			<input type="radio" name="is_best" value="否">否
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品图片</label>
		@if($goods->goods_img)<img src="{{env('UPLOADS_URL')}}{{$goods->goods_img}}" width="30" height="30">@endif
		<div class="col-sm-4">
			<input type="file" class="form-control" id="firstname" name="goods_img" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品相册</label>
		@if($goods->goods_imgs)
					@php $goods_imgs=explode('|',$goods->goods_imgs); @endphp
					@foreach($goods_imgs as $vv)
						<img src="{{env('UPLOADS_URL')}}{{$vv}}" width="30" height="30">
					@endforeach
					@endif
		<div class="col-sm-4">
			<input type="file" class="form-control" name="goods_imgs[]" multiple="multiple" id="form-field-2" checked  value=""/>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品详情</label>
		<div class="col-sm-8">
			<textarea name="goods_desc" id="" cols="50" rows="4" placeholder="请输入商品详情">{{$goods->goods_desc}}</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌</label>
		<div class="col-sm-8">
			<select name="brand_id" id="">
				<option value="0">--请选择--</option>
				<option value="">oppo</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类</label>
		<div class="col-sm-8">
			<select name="cate_id" id="">
				<option value="0">--请选择--</option>
				<option value="">童装</option>
			</select>
		</div>
	</div>
	
	
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>