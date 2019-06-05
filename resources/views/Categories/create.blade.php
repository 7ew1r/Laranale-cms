@extends('layouts.default')
@section('content')

<div class="col-8 offset-2 my-5">

	{{-- 投稿完了時にフラッシュメッセージを表示 --}}
	@if(Session::has('message'))
		<div class="alert alert-success">
			<p><i class="fas fa-info-circle"></i> {{ Session::get('message') }}</p>
		</div>
	@endif

	{{-- エラーメッセージの表示 --}}
	@foreach($errors->all() as $message)
		<p class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</p>
	@endforeach

<div class="card">
<h2 class="card-header">カテゴリー追加ページ</h2>
<div class="card-body">
{{ Form::open(['route' => 'categories.store'], array('class' => 'form')) }}

	<div class="form-group">
		<label for="title" class="">カテゴリー名</label>
		<div class="">
			{{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">投稿する</button>
	</div>
{{ Form::close() }}
</div>
</div>

@stop