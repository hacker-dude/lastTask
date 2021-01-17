@extends('layouts.app')

@section('content')
<div class="card" style="width: 18rem;">
    <div class="card-body">
    <h5 class="card-title">{{$product->title}}</a></h5>
    <p class="card-text">{{$product->description}}</p>
    <p class="card-text">{{$product->price}}</a>
    	<form action="{{ route('addcomment') }}" method="post">
    		@csrf
    		<input type="hidden" value="{{$product->id}}" name="post_id">
    		<input type="text" name="comment">
    		<button type="submit" class="btn btn-primary">comment</button>
    	</form>
    	<div class="card">
    		<div class="card-body">
    			@foreach($comments as $comment)
    				<p class="card-text">{{$comment->comment}}</p>
    				<form action="{{ route('addreply') }}" method="post">
			    		@csrf
			    		<input type="hidden" value="{{$comment->id}}" name="comment_id">
			    		<input type="text" name="reply">
			    		<button type="submit" class="btn btn-primary">comment</button>
			    	</form>
			    	<div class="card">
			    		<div class="card-body">
			    			@foreach(\App\Services\CommentServices::ReplyByComment($comment->id) as $reply)
			    			<p class="card-text">{{$reply->reply}}</p>
			    			@endforeach
			    		</div>
			    		
			    	</div>
    			@endforeach
    		</div>
    		
    	</div>
  </div>
</div>
@endsection