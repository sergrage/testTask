@extends('layouts.app')
@section('content')

<div class="row">
<div class="col mt-5">
	<h1 class="card-title" data-id="{{$article->id}}" > {{$article->title}}</h1>
	<img class="card-img-top" src="https://via.placeholder.com/800" alt="Card image cap">
	  <div class="card-body">
	<p class="card-text">{{$article->body}}</p>
	<span class="btn btn-light" id="viewsNumber"><i class="fas fa-eye"></i> {{$article->views}}</span>
	  <span id="likesNumber" class="btn btn-success"><i class="far fa-thumbs-up"></i> {{$article->likes}}</span>
	  <div class="mt-5 mb-3">
      @foreach ($article->tags as $tag)
        <a href="#" class="badge badge-danger">{{$tag->label}}</a>
      @endforeach
    </div>
    <div class="">
     Опубликовано {{ $article->createdAtForHumans()}}
    </div>
</div>
   
</div>
</div>
<hr>
<form class="addComment" method="POST" action="{{route('comment.store')}}">
	 @csrf 
  <div class="form-group">
    <label>Тема комментария</label>
    <input id="commentTitle" type="text" class="form-control" name="title">
    <small class="form-text text-muted">Валидация: require | min:6 </small>
    <span class="text-danger error-text commentTitle_err"></span>
  </div>
  <div class="form-group">
    <label>Текст комментария</label>
    <textarea id="commentBody" class="form-control" rows="3" name="body"></textarea>
    <small class="form-text text-muted">Валидация: require | min:10 </small>
 	<span class="text-danger error-text commentBody_err"></span>
  </div>
  <button id="addComment" type="submit" class="btn btn-primary">Отправить</button>
  <input type="hidden" id="commentId" name="id" value="{{$article->id}}">
</form>

<hr>

@foreach ($article->comments as $comment)

	<div class="media m-5">
	  <img src="https://via.placeholder.com/64" class="mr-3" alt="...">
	  <div class="media-body">
	    <h5 class="mt-0">{{$comment->title}}</h5>
	    {{$comment->body}}
	  </div>
	</div>
	<hr>
@endforeach

@endsection

@section('script')
<script type="text/javascript">
$( document ).ready(function() {
	function viewsIncrement() {

		// let articleId = $('#commentId').val();
		let articleId = $('.card-title').data('id');
	    $.ajax({
	    url: "/articles/viewsIncrement",
	    type: "POST",
	    data:{
	    	"articleId":  articleId
		},
		headers:{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
	    success: function(data)
	    {	
	        $('#viewsNumber').html(data);
	    },
	    error: function(){
	    	alert('Что-то пошло не так viewsIncrement');
	    }
	});
	}
	setTimeout(viewsIncrement, 5000); 
    console.log( "ready!" );
});
</script>

@endsection


