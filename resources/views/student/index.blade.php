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
					<th>添加时间</th>
					<th width="120">操作</th>
				</tr>
				</thead>
				<tbody>
				@foreach($students as $student)
					<tr>
						<th>{{$student->id}}</th>
						<td>{{$student->name}}</td>
						<td>{{$student->age}}</td>
						<td>{{$student->getSex($student->sex)}}</td>
						<th>{{date('Y-m-d',$student->created_at)}}</th>
						<td>
							<a href="{{url('student/detail/'.$student->id)}}">详情</a>
							<a href="{{url('student/update/'.$student->id)}}">修改</a>
							<a href="{{url('student/delete',['id' => $student->id])}}"
							onclick="if(confirm('确认要删除吗？') == false) return false;"
							>删除</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<!-- 分页 -->
	<div class="pull-right">
		{{$students->render()}}
	</div>
@stop