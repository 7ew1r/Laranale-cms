@extends('layouts.default')
@section('content')

<div class="col-8 offset-2">

@foreach($posts as $post)

	<h2>{{ link_to("posts/{$post->id}" ,$post->title ) }}</h2>
	<p>
	<span>by {{ link_to("users/{$post->user->id}" ,$post->user->name) }}</span>
	<span><i class="fas fa-comment"></i> {{ $post->comment_count }}</span>
	<span>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</span>
	</p>
	<hr />
@endforeach

{{ $posts->links() }}

</div>

@stop