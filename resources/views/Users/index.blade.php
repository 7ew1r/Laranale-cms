@extends('layouts.default')
@section('content')

<div class="col-8 offset-2 bg-light my-5">

@foreach($users as $user)

	<h2>{{ link_to("users/{$user->id}", $user->name) }}</h2>
	<hr />
@endforeach

{{ $users->links() }}

</div>

@stop