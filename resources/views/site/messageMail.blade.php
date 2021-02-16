<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('assets.header')
    </head>
    <body>
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="card card-primary col-md-6">
                <div class="card-header card-primary">
                    Alteação de senha
                </div>
                <div class="card-body">
                    <h5 class="card-title">Olá {{$user->name}}</h5>
                    <p class="card-text">Você solicitou alteração de senha para o
                        PainelADM, clique no botão abaixo para alterar.</p>
                    <a href="{{$link}}" class="btn btn-primary">Alterar senha</a>
                    <p>
                        Se não foi você quem solicitou, ignore esta mensagem.
                    </p>
                </div>
            </div>
        </div>
        @include('assets.scriptsFooter')
    </body>
</html>
