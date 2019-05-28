@extends('layouts.default')
@section('content')

<div class="col-8 offset-2">

@foreach($posts as $post)

	<h2>{{ link_to("posts/{$post->id}" ,$post->title ) }}</h2>
	@php
			$user_id = DB::table('users')->where('id', $post->user_id)->value('id');
			$user_name = DB::table('users')->where('id', $post->user_id)->value('name');
	@endphp
	<p>
	<span>by {{ link_to("users/{$user_id}" ,$user_name) }}</span>
	<span><i class="fas fa-comment"></i> {{ $post->comment_count }}</span>
	<span>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</span>
	</p>
	<hr />
@endforeach

{{ $posts->links() }}

</div>

@stop