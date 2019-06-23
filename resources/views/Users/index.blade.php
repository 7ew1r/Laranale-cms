@extends('layouts.default')
@section('content')

<div class="col-8 offset-2 my-5">

	<div class="card">
		<div class="card-body">
			@foreach($users as $user)
				<h2>{{ link_to("users/{$user->id}", $user->name, ['class' => 'text-dark']) }}</h2>
				<hr />
			@endforeach
		</div>
		{{ $users->links() }}
	</div>
</div>

@stop