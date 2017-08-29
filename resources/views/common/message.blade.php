@if(Session::has('success'))
<!-- 成功提示框 -->
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>成功！</strong> {{Session::get('success')}}
</div>
@endif

<!-- 失败提示框 -->
@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <strong>失败！</strong> {{Session::get('error')}}
</div>
@endif





