@extends('layouts.default')
@section('content')

<div class="col-8 offset-2 my-5">

{{-- フラッシュメッセージを表示 --}}
@if(Session::has('message'))
	<div class="alert alert-success">
		<p><i class="fas fa-info-circle"></i> {{ Session::get('message') }}</p>
	</div>
@endif

	<div class="card">
		<div class="card-body">
			@foreach($posts as $post)
			<h2 class="h3">{{ link_to("posts/{$post->id}" ,$post->title, ['class' => 'text-dark'] ) }}</h2>
			<p>
				<span>by {{ link_to("users/{$post->user->id}" ,$post->user->name, ['class' => 'text-dark']) }}</span>
				<span class="mx-2"><i class="fas fa-comment-dots"></i> {{ $post->comment_count }}</span>
				<span>投稿日：{{ date("Y年 m月 d日",strtotime($post->created_at)) }}</span>
			</p>
			<hr />
			@endforeach
			{{ $posts->links() }}
		</div>
	</div>
</div>

@stop