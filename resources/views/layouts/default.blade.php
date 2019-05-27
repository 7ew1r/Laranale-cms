<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    <title>Laranale</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="{{ url('/') }}" class="navbar-brand">Laranale</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="ナビゲーションの切替">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav mr-auto">
            <div class="collapse navbar-collapse" id="navbarNav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url("users") }}"><i class="fas fa-users"></i> ユーザー一覧<span
                            class="sr-only">(現位置)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url("categories") }}">カテゴリ一覧 <span class="sr-only">(現位置)</span></a>
                </li>
            </div>
        </ul>
        @if (Auth::check())
        @php
            $user = Auth::user();
            $user_id = Auth::id();
        @endphp
        <a href="{{ url("posts/create") }}" class="btn btn-secondary mx-2"><i class="fas fa-pen"></i> 投稿する</a>
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle text-white mx-2" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">{{ $user->name }}</a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown1">
            <a class="dropdown-item" href="{{ url("users/{$user_id}") }}">マイページ</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                    ログアウト
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                {{-- <form action="{{ route('logout') }}" method="POST">{{ csrf_field() }}</form> --}}
                {{-- <a class="dropdown-item" href="{{ route('logout') }}">ログアウト</a> --}}
            </div>
        </div>
        @else
        <a href="{{ url("register") }}" class="btn btn-outline-light mx-2"> ユーザー登録</a>
        <a href="{{ url("login") }}" class="text-white mx-2"> ログイン</a>
        @endif
    </nav>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>