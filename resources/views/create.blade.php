@extends('layouts.default')
@section('content')

<div class="col-8 offset-2">

<h1>投稿ページ</h1>

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

{{ Form::open(['route' => 'posts.store'], array('class' => 'form')) }}

	<div class="form-group">
		<label for="title" class="">タイトル</label>
		<div class="">
			{{ Form::text('title', null, array('class' => '')) }}
		</div>
	</div>

	<div class="form-group">
		<label for="cat_id" class="">カテゴリー</label>
		<div class="">
			<select name="cat_id" type="text" class="">
				<option></option>
				<option value="1" name="1">電化製品</option>
				<option value="2" name="2">食品</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="content" class="">本文</label>
		<div class="">
			{{ Form::textarea('content', null, array('class' => '')) }}
		</div>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">投稿する</button>
	</div>

{{ Form::close() }}

</div>

@stop