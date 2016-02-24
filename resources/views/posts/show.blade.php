@extends('templates.default')
@section('title'){{ $title }} @stop 

@section('content')
	@if(!Auth::guest() && ($author_id == Auth::user()->id))
		<button class="btn" style="float: right"><a href="{{ url('edit/'.$slug)}}">Edit Post</a></button>
	@endif
	<div style="clear:both;">
		<h2>{{ $title }}</h2>
		{!! $body !!}
	</div>
	<hr/>
	Add a comment...
	<div class="panel-body">
		<form id="comment_form">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="post_id" value="{{ $id }}">
			<input type="hidden" name="slug" value="{{ $slug }}">
			<div class="form-group">
				<textarea required="required" placeholder="Enter comment here" name = "body" class="form-control"></textarea>
			</div>
			<input type="button" name='post_comment' class="btn btn-success" value = "Post"/>
		</form>
	</div>
	<hr/>
	<ul style="list-style: none; padding: 0" id="comment_list">
		@if(isset($comments))
			@include('posts.comment')
		@endif
	</ul>
	<script>
		$('[name="post_comment"]').click(function(){
			var post_id = $('[name="post_id"]').val();
			var slug = $('[name="slug"]').val();
			var post_body = $('[name="body"]').val();
			$.post('/comments',{'post_id':post_id, 'post_body':post_body, 'slug':slug},function(data){
				if(data){
					$('#comment_list').html(data);
					$('[name="body"]').val('');
				}				
			})
		});
		
	</script>
@stop