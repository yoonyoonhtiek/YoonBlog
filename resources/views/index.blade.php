@extends("layouts.app")
@section("content")
<div class="container">
    @if(session('info'))
        <div class="alert alert-info">
            {{session('info')}}
        </div>
    @endif
    {{$articles->links()}}
    @foreach($articles as $article)

        <div class="card mb-2">
            <div class="card-body mb-2">
              
                <h5 class="card-title text-primary">{{$article->title}}</h5>
            
            <div class="card-subtitle text-muted mb-2">
                {{ $article->created_at->diffForHumans() }}
            </div>
            <p class="card-text mb-2">
                {{$article->body}}
            </p>
            <a class="card-link" href="{{ url('/articles/detail',$article->id) }}">

                View Detail &raquo;</a>
        </div>
        </div>

    @endforeach
</div>
@endsection