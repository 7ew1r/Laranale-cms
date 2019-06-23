@extends('layouts.default')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6 my-5">
      <div class="card">
        <div class="card-header">ユーザー登録</div>

        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="control-label">名前</label>

              <div class="">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                  autofocus>

                @if ($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="control-label">メールアドレス</label>

              <div class="">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="control-label">パスワード</label>

              <div class="">
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group">
              <label for="password-confirm" class="control-label">パスワード（確認）</label>

              <div class="">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div>

            <div class="form-group">
              <div class="">
                <button type="submit" class="btn btn-primary">
                  登録
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-6 my-5">
      <div class="card card-body bg-secondary text-light">
          <h1 class="h5 card-title"><i class="fas fa-exclamation-triangle"></i> 注意</h1>
          <p>メール送信を行う機能（パスワードリセット等）は未実装のため、実在していないメールアドレスで登録が可能です</p>
          <p>(例：<kbd>xxxxxx@example.com</kbd> )</p>
          <p>ユーザの削除依頼 / 問題点などありましたら、Twitter/GitHubにてご連絡ください。</p>
          <ul>
            <li>Twitter : (<a href="https://twitter.com/r_tewi" target="blank" rel="noopener noreferrer" class="text-white">@r_tewi <i class="fas fa-external-link-alt"></i></a>)</li>
            <li>GitHub : (<a href="https://github.com/7ew1r/Laranale-cms" target="blank" rel="noopener noreferrer" class="text-white">https://github.com/7ew1r/Laranale-cms  <i class="fas fa-external-link-alt"></i></a>)</li>
          </ul>
      </div>
    </div>
  </div>
</div>
@endsection