@if(isset($comments))
	<li>Comments({{count($comments)}})</li>	
	@foreach($comments as $comment)
		<li class="list-group-item"	>	
			
			<div style="width: 100%; overflow: hidden;">
				<div style="float:left;border-right:1px solid gray;padding:10px;margin-right:10px;">	
				By:		
				<p>{{ $comment['from_user'] }}</p>
				<p>{{ $comment['created_at']}}</p>
				</div>
				<h3>{{ $comment['body'] }}</h3>
				
			</div>				
						
		</li>
	@endforeach	
@endif