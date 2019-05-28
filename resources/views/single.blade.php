@extends('layouts.default')
@section('content')

<div class="col-8 offset-2 bg-light">
	<div class="py-5">
	<div>
		<span>by {{ link_to("users/{$post->user->id}", $post->user->name) }}</span>
		<span class="mx-4"><i class="far fa-clock"></i> {{ date("Y年 m月 d日",strtotime($post->created_at)) }}</span>
		@if (Auth::id() == $post->user_id)
			<span class="float-right">{{ link_to("posts/{$post->id}/edit","編集する") }}</span>
		@endif
	</div>
	<h2>{{ $post->title }}</h2>
	<p>カテゴリー：{{ $post->category->name }}</p>
	<p>{{ $post->content }}</p>

	<hr />

	<h3>コメント一覧</h3>
	@foreach($post->comments as $single_comment)
		<h4>{{ $single_comment->commenter }}</h4>
		<p>{{ $single_comment->comment }}</p><br />
	@endforeach

	<hr />
	<h3>コメントを投稿する</h3>
	{{-- 投稿完了時にフラッシュメッセージを表示 --}}
	@if(Session::has('message'))
		<div class="bg-info">
			<p>{{ Session::get('message') }}</p>
		</div>
	@endif

	{{-- エラーメッセージの表示 --}}
	@foreach($errors->all() as $message)
		<p class="bg-danger">{{ $message }}</p>
	@endforeach

	{{ Form::open(['route' => 'comment.store'], array('class' => 'form')) }}

		<div class="form-group">
			<label for="commenter" class="">名前</label>
			<div class="">
				{{ Form::text('commenter', null, array('class' => '')) }}
			</div>
	</div>

		<div class="form-group">
			<label for="comment" class="">コメント</label>
			<div class="">
				{{ Form::textarea('comment', null, array('class' => '')) }}
			</div>
		</div>

		{{ Form::hidden('post_id', $post->id) }}

		<div class="form-group">
			<button type="submit" class="btn btn-primary">投稿する</button>
		</div>


	{{ Form::close() }}


	</div>
</div>
</article>
@stop