@extends('templates.default')
@section('title') Home @stop

@section('content')
	<ul class="list-group">
	@if(isset($posts))
	@foreach($posts as $post)
		<li class="list-group-item">
			<table>
				<tr>
					<td>
						<h2><a href="{{ url('/posts/'.$post['slug']) }}">{{ $post['title'] }}</a></h2>
					</td>
				</tr>
				<tr>
					<td style="width:90%;color:green;"><i>Published on {{ $post['created_at']->format('l jS \\of F Y') }} </i></td>
					<td><span style="color:navy;">comment({{$post['count']}})</span></td>
				</tr>
				<tr>
					<td>
						{!! str_limit($post['body'],300) !!} <a href="{{ url('/posts/'.$post['slug']) }}">read more</a>
					</td>
				</tr>
			</table>
		</li>
	@endforeach
	@endif
	</div>{{--end of list group--}}	
@stop