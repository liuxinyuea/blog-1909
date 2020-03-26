<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品添加<a style="float:right" href="{{url('/goods/index')}}" class="btn btn-default">列表</a></h2></center><hr/>
<!-- @if ($errors->any()) 
<div class="alert alert-danger">
 <ul>
 	@foreach ($errors->all() as $error) 
 		<li>{{ $error }}</li>
 	@endforeach
 </ul>
</div>
@endif -->

<form action="{{url('/goods/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_name" placeholder="请输入商品名称">
			<b style="color:red">{{$errors->first('goods_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品货号</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_size" placeholder="请输入商品货号">
			<b style="color:red">{{$errors->first('goods_size')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_price" placeholder="请输入商品价格">
			<b style="color:red">{{$errors->first('goods_price')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">库存</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="goods_num" placeholder="请输入库存">
			<b style="color:red">{{$errors->first('goods_num')}}</b>
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
		<label for="firstname" class="col-sm-2 control-label">是否首页幻灯片推荐</label>
		<div class="col-sm-8">
			<input type="radio" name="is_slide" value="1" checked>是
			<input type="radio" name="is_slide" value="2">否
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品图片</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="goods_img" >
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品相册</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" name="goods_imgs[]" multiple="multiple" id="form-field-2" checked  value=""/>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品详情</label>
		<div class="col-sm-8">
			<textarea name="goods_desc" id="" cols="50" rows="4" placeholder="请输入商品详情"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌</label>
		<div class="col-sm-8">
			<select name="brand_id" id="">
				<option value="0">--请选择--</option>
				@foreach($brand as $v)
				<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
				@endforeach
			</select>
				<b style="color:red">{{$errors->first('brand_id')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类</label>
		<div class="col-sm-8">
			<select name="cate_id" id="">
				<option value="0">--请选择--</option>
				@foreach($category as $v)
				<option value="{{$v->cate_id}}">{{str_repeat('|-',$v->level)}}{{$v->cate_name}}</option>
				@endforeach
			</select>
				<b style="color:red">{{$errors->first('cate_id')}}</b>
		</div>
	</div>
	
	
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>