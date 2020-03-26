<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>文章添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>文章添加<a style="float:right" href="{{url('/article/index')}}" class="btn btn-default">列表</a></h2></center><hr/>


<form action="{{url('/article/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="title" placeholder="请输入文章标题">
			<b style="color:red">{{$errors->first('title')}}</b>
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
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-8">
			<input type="radio" name="is_show" value="1" checked>是
			<input type="radio" name="is_show" value="2">否
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-8">
			<input type="radio" name="impro" value="1" checked>普通
			<input type="radio" name="impro" value="2">置顶
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="author" placeholder="请输入文章作者">
			<b style="color:red">{{$errors->first('author')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">邮箱</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="email" placeholder="请输入邮箱">
			<b style="color:red">{{$errors->first('email')}}</b>
		</div>
	</div>
	
	
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">相关图片</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="img" >
			<b style="color:red">{{$errors->first('img')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章详情</label>
		<div class="col-sm-8">
			<textarea name="intro" id="" cols="50" rows="4" placeholder="请输入文章详情"></textarea>
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