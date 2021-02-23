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
                    Documento recebido - PainelADM
                </div>
                <div class="card-body">
                    <h5 class="card-title"><h2>Olá {{$user->name}}</h2></h5>
                    <p class="card-text">Você recebeu em sua área do cliente o documento<br>
                        <h3>{{$user->documentTitle}}</h3>
                    </p>
                    <p>
                       Obirgado por utilizar nossos serviços!!
                    </p>
                </div>
            </div>
        </div>
        @include('assets.scriptsFooter')
    </body>
</html>
