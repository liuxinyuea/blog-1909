<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书表添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>图书表添加</h2></center><hr/>
<form action="{{url('/book/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="name" placeholder="请输入图书名称">
			<b style="color:red">{{$errors->first('name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书作者</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="author" placeholder="请输入图书作者">
			<b style="color:red">{{$errors->first('author')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书价格</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="price" placeholder="请输入图书价格">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">图书封面</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="img" >
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
