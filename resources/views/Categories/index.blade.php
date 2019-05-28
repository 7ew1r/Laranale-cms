@extends('layouts.default')
@section('content')

<div class="col-8 offset-2 bg-light">

@foreach($categories as $category)

	<h2>{{ link_to("categories/{$category->id}", $category->name) }}</h2>
	<hr />
@endforeach

{{ $categories->links() }}
</div>


@stop