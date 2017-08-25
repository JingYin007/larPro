

Hello section
<p>{{$word}}</p>

<p>{{date('Y-m-d H:i:s',time())}}</p>
<p>{{in_array($word,$arr)?'true':'false'}}</p>

<!--这是注释-->
{{--注释--}}

{{--引入子视图 include --}}
<hr>
@if($name == 'moT')
    <b>Yes I`m MoT</b>
@elseif($name == 'Tom')
    Sorry
@else
    Do it !
@endif
<br>
@foreach($babys as $baby)
<p><b>{{$baby->name}}</b></p>
@endforeach



@extends('welcome')
