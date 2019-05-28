@extends('layouts.default')
@section('content')

<div class="col-8 offset-2 bg-light">

<p>カテゴリー：「{{ $category->name }}」の記事一覧</p>
@foreach($category->posts as $post)
	<h2>{{ link_to("posts/{$post->id}", $post->title) }}</h2>
  <hr />
@endforeach

</div>
@stop