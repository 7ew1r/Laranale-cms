@extends('layouts.default')
@section('content')

<div class="col-8 offset-2 my-5">

	<div class="card">
		<div class="card-body">
			@foreach($categories as $category)
				<h2>{{ link_to("categories/{$category->id}", $category->name) }}</h2>
				<hr />
			@endforeach
			<h3>{{ link_to("categories/create", "＋ カテゴリーを追加する") }}</h2>
		</div>
	</div>
{{ $categories->links() }}
</div>
@stop