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
        <form action="{{ route('users.destroy',['id' => $user->id]) }}" method="POST">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger btn-delete">
            <i class="fas fa-trash-alt"></i> ユーザを削除
          </button>
        </form>
    </div>
  </div>

  <div class="card my-4">
    <h2 class="card-header">投稿記事一覧</h2>
    <ul class="list-group list-group-flush">
      @foreach ($user->posts as $post)
      <li class="list-group-item">
        <span>{{ link_to("posts/{$post->id}", $post->title) }}</span>
        <span class="mx-2"><i class="fas fa-comment-dots"></i> {{ $post->comment_count }}</span>
		    <span><i class="far fa-clock"></i> {{ date("Y年 m月 d日",strtotime($post->created_at)) }}</span>
      </li>
      @endforeach
    </ul>
  </div>
</div>

@section('script')
  <script>
  $(function(){
  $(".btn-delete").click(function(){
  if(confirm("本当に削除しますか？")){
  }else{
  return false;
  }
  });
  });
  </script>
@endsection

@stop