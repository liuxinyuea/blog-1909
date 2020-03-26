<style>
	
	ul li{

		float:left;
		margin-left: 20px;
	}
</style>
<form action="">
		<input type="text" name="name" placeholder="请输入书名" value="{{$name}}">
		
		<button>搜索</button>
	</form>


<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>图书名称</th>
				<th>图书作者</th>
				<th>图书价格</th>
				<th>图书封面</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($book as $v) 
			<tr>
				<td>{{$v->id}}</td>
				<td>{{$v->name}}</td>
				<td>{{$v->author}}</td>
				<td>{{$v->price}}</td>
				<td>@if($v->img)<img src="{{env('UPLOADS_URL')}}{{$v->img}}" width="30" height="30">@endif</td>
				<td>
					<button type="button" class="btn btn-primary">编辑</button>|
					<button type="button" class="btn btn-danger">删除</button>
				</td>
			</tr>
			@endforeach
			<tr><td colspan="6">{{$book->appends($name)->links()}}</td></tr>
		</tbody>
</table>