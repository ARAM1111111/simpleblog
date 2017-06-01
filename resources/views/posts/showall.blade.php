@extends('layouts.appposts')

@section('header')
	<h1 style="color:white">{{$posts->first()->author->name}}({{$posts->count()}})<br><br><br><br><br><br><br><br><br></h1>
@endsection

@section('content')
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
@endsection