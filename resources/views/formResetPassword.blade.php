<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Painel ADM</title>

        @include('assets.header')
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Painel</b> ADM</a>
            </div>
        <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Altere a sua senha {{$user->name}}</p>
                    <form action="{{ route ('reset') }}" method="post">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <input id="email" value="{{$user->email}}" type="hidden">
                            <input type="password" minlength="8" required class="form-control" name="password"
                                    id="password" placeholder="Senha" value="{{ old('password_confirmation') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" minlength="8" required class="form-control" name="password_confirmation"
                                    id="password_confirmation" oninput="validaSenha(this)" placeholder="Repita a senha"
                                    value="{{ old('password_confirmation') }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Alterar senha</button>
                            </div>
                        </div>
                    </form>
                    <p class="mt-3 mb-1">
                        <a href="/">Fazer login</a>
                    </p>
                </div>
            </div>
        </div>
        @include('assets.scriptsFooter')
    </body>
</html>
