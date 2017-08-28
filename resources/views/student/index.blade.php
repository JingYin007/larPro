@extends('common/layouts')

@section('content')

@include('common/message')
	<!-- 自定义内容 -->
	<div class="panel panel-default">
		<div class="panel-heading">学生列表</div>
		<div class="panel-body">
			<table class="table table-striped table-responsive table-hover">
				<thead>
				<tr>
					<th>id</th>
					<th>姓名</th>
					<th>年龄</th>
					<th>性别</th>
					<th width="120">操作</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<th>1001</th>
					<td>name1</td>
					<td>18</td>
					<td>20-男</td>
					<td>
						<a href="">详情</a>
						<a href="">修改</a>
						<a href="">删除</a>
					</td>
				</tr>
				<tr>
					<th>1001</th>
					<td>name1</td>
					<td>18</td>
					<td>20-男</td>
					<td>
						<a href="">详情</a>
						<a href="">修改</a>
						<a href="">删除</a>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>

	<!-- 分页 -->
	<nav>
		<ul class="pagination pull-right">
			<li  class="previous"><a href="#">&laquo;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">&raquo;</a></li>
		</ul>
	</nav>
@stop