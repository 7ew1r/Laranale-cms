@extends('layouts.default')
@section('content')

<div class="col-md-8 offset-2 my-4">

  <div class="card">
    <h2 class="card-header">ユーザーページ</h2>
    <div class="card-body">
        <p>ID: {{ $user->id }}</p>
        <p>名前: {{ $user->name }}</p>
        <p>メールアドレス: {{ $user->email }}</p>
        <p>作成日時: {{ $user->created_at }}</p>
      {{-- <a href="" class="card-link">編集</a> --}}
    </div>
  </div>

  <h3>投稿記事一覧</h3>
  @foreach ($user->posts as $post)
    {{-- <h4>{{ $post->title }}</h4> --}}
    <h4>{{ link_to("posts/{$post->id}", $post->title) }}</h4>
  @endforeach

</div>

@stop