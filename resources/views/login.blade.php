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
        @include('assets.modalsAlerts')

        @include('assets.alerts')
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="#" class="h1"><b>Painel</b> ADM</a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Informe os dados para o login</p>

                    <form action="/login" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" value="josopadilha@gmail.com" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" value="josoepadilha" class="form-control" placeholder="Senha">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="remember">
                                        Lembre-me
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 esqueciSenha">
                                <a href="/forgetPassword">Esqueci a senha</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('assets.scriptsFooter')
    </body>
</html>
