@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-2">
            <div class="card-body mb-2">
                
                <h5 class="card-title mb-2 text-muted">
                    <!-- dd($article); -->
                    <b>{{$article->user_id}}</b>
                    {{$article->title}}
                </h5>
             
                <div class="card-subtitle mb-2 text-muted">
                    {{$article->created_at->diffForHumans()}},
                    Category:<b>{{$article->category->name}}</b>
                </div>
                <p class="card-text">
                    {{$article->body}}
                </p>
                <a href="{{url('/articles/delete', ['id' => $article->id])}}" class="">Delete</a>

           
            </div>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
           <b> Comments({{count($article->comments)}})</b>
        </li>
        @foreach($article->comments as $comment)
            <li class="list-group-item">
                <a href="{{url('/comments/delete', ['id' => $comment->id])}}" class="">Delete</a>
                {{$comment->content}}
                <div class="small mt-2">
                    By <b>{{ $comment->user->name }}</b>,
                    {{$comment->created_at->diffForHumans()}}
                   
       
                </div>
            </li>
           
        @endforeach
    </ul>
    @auth
   
    <form action="{{ url('/comments/add') }}" method="post">
        @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">

            <textarea name="content" class="form-control mb-2"
                placeholder="New Comment"></textarea>
            <input type="submit" value="Add Comment"
            class="btn btn-secondary">
        
            
    </form>
    </div>
   @endauth
@endsection