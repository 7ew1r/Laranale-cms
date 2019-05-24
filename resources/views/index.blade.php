@extends('layouts.default')
@section('content')

<div class="col-8 offset-2">

@foreach($posts as $post)

	<h2>{{ link_to("posts/{$post->id}" ,$post->title ) }}
		<small>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</small>
	</h2>
	@php
			$user_id = DB::table('users')->where('id', $post->user_id)->value('id');
			$user_name = DB::table('users')->where('id', $post->user_id)->value('name');
	@endphp
	{{-- <p>by {{ DB::table('users')->where('id', $post->user_id)->value('name') }}</p> --}}
	<p>by {{ link_to("users/{$user_id}" ,$user_name) }}
	<p>コメント：{{ $post->comment_count }}</p>
	<hr />
@endforeach

</div>

@stop