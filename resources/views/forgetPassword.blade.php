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
            <div class="login-logo">
                <a href="#"><b>Painel</b> ADM</a>
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Esqueceu sua senha? Informe seu e-mail para recuperar.</p>
                    <form action="/sendMailReset" method="post">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <input required name="email" value="josopadilha@gmail.com" id="email" type="email"
                                class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Solicitar senha</button>
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
