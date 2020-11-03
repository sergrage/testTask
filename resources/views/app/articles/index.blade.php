@extends('layouts.app')
@section('content')
<div class="jumbotron">
  <h1 class="display-4">Тут каталог статей</h1>

  <hr class="my-4">
  <p>10 статей на странице, пиджинация. LIFO.</p>
</div>
<div class="row">
@foreach ($articles as $article)
 <div class="col-md-6">
 	<div class="card p-3 m-3">
  <img class="card-img-top" src="https://via.placeholder.com/600" alt="Card image cap">
  <div class="card-body">
  	<h5 class="card-title">{{$article->title}}</h5>
    <p class="card-text">{{$article->preview}}</p>
    <a href="{{route('article.show', $article->slug)}}" class="btn btn-primary">Прочитать статью</a>
    <div class="">
    	<span class="badge badge-primary"><i class="fas fa-eye"></i> {{$article->views}}</span>
  		<span class="badge badge-success"><i class="far fa-thumbs-up"></i> {{$article->likes}}</span>
    </div>
    <div class="">
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

@endforeach
</div>

{{ $articles->links() }}


@endsection


