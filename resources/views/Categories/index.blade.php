@extends('layouts.default')
@section('content')

<div class="col-8 offset-2 bg-light my-5">

@foreach($categories as $category)
	<h2>{{ link_to("categories/{$category->id}", $category->name) }}</h2>
	<hr />
@endforeach
	<h2>{{ link_to("categories/create", "＋ カテゴリーを追加する") }}</h2>
	<hr />
{{ $categories->links() }}
</div>
@stop