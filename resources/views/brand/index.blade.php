<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>品牌列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品品牌列表<a style="float:right;" href="{{url('brand/create')}}" class="btn btn-default">添加</a></h2></center><hr/>
<div class="table-responsive">
	<form action="">
		<input type="text" name="name" placeholder="请输入品牌关键字" value="{{$query['name']??''}}">
		<input type="text" name="url" placeholder="请输入网址关键字" value="{{$query['url']??''}}">
		<button>搜索</button>
	</form>
	<table class="table">
		<thead>
			<tr>
				<th>品牌ID</th>
				<th>品牌名称</th>
				<th>品牌网址</th>
				<th>品牌logo</th>
				<th>品牌描述</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($brand as $v) 
			<tr>
				<td>{{$v->brand_id}}</td>
				<td>{{$v->brand_name}}</td>
				<td>{{$v->brand_url}}</td>
				<td>@if($v->brand_logo)<img src="{{env('UPLOADS_URL')}}{{$v->brand_logo}}" width="30" height="30">@endif</td>
				
				<td>{{$v->brand_desc}}</td>
				<td>
					<a href="{{url('/brand/edit/'.$v->brand_id)}}" class="btn btn-primary">编辑</a>|
					<a href="javascript:void(0)" id="{{$v->brand_id}}"  class="btn btn-primary">删除</a>
				</td>
			</tr>
			@endforeach
			<tr><td colspan="6">{{$brand->appends($query)->links()}}</td></tr>
		</tbody>  
</table>
</div>  
<script>
	// ajax删除
	$('.btn-primary').click(function(){
		var id =$(this).attr('id');
		// alert(id);
		if(confirm('确认要删除当前记录吗？')){
			$.get('/brand/destroy/'+id,function(result){
				
			});
		}
	});



	// 无刷新分类
	$(document).on('click','.pagination a',function(){
	// $('.pagination a').click(function(){
	    var url=$(this).attr('href');
		$.get(url,function(result){
			$('tbody').html(result);
		});


		return false;

	});




</script>	

</body>
</html>