@extends('layouts.app')

@section('header')
    <div class="site-heading">
        <h1>SECTOR CODE</h1>
        <hr class="small">
        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
    </div>
@endsection

@section('content')

    @if(!$posts->count())
        No posts for showing.Write post.
    @else
        @foreach($posts as $post)
            <h2 class="post-title">
                <a href="{{url('/'.$post->slug)}}">{{$post->title}}</a>
            </h2>
            <p class="post-subtitle">
                {!! str_limit($post->body,$limit=120,$end='......<a href='.url("/".$post->slug).'>READ MORE</a>') !!}
            </p>
            <p class="post-meta">
                {{$post->created_at->format('M d,Y \a\t h:i:a')}} BY <a href="{{url('/user/'.$post->author_id)}}">{{$post->author->name}}</a>
            </p>
        @endforeach
    @endif
@endsection

@section('pagination')
    <div class="row">
        <hr>
        {!!$posts->links()!!}
    </div>
@endsection
