@extends('layouts.default')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-2 my-5">

    {{-- フラッシュメッセージを表示 --}}
	  @if(Session::has('message'))
      <div class="alert alert-success">
        <p><i class="fas fa-info-circle"></i> {{ Session::get('message') }}</p>
      </div>
	  @endif
    {{-- エラーメッセージの表示 --}}
    @foreach($errors->all() as $message)
      <p class="alert alert-danger"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</p>
    @endforeach

      <div class="card">
        <div class="card-header">ログイン</div>

        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="control-label">メールアドレス</label>

              <div class="">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                  autofocus>

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
              <div class="">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="">
                <button type="submit" class="btn btn-primary">
                  ログイン
                </button>
                {{-- 
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
                </a> --}}
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection