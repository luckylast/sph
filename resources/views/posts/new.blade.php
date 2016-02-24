@extends('templates.default')
@section('title')Create New Post @stop 

@section('content')
	
	<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
	<script type="text/javascript">
		tinymce.init({
			selector : "textarea",
			plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
			toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
		}); 
	</script>
	

	<h1>Add New Post</h1><br>
	
	<form method="post" action="/create-post" role="form" >
	<div class="form-group">
		<label for="title">Post Title:</label>
		<input required="required" placeholder="Enter title here" type="text" name = "title" class="form-control"/>
	</div>
	<div class="form-group">
		<label for="postContent">Post Content:</label>
		<textarea name='body' ></textarea>
	</div>
	<div class="form-group"> 
		<input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
	</div>
</form>
@stop