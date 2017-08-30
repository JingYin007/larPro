<!-- 错误提示 -->

@if(count($errors))
    <div class="alert alert-danger" role="alert">

        <ul>
            {{--<li>{{$errors->first()}}</li>--}}
            @foreach($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
        </ul>
    </div>
@endif