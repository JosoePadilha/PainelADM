@extends('site.main')
@section('title', 'PainelADM - Clientes')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-3 col-sm-6">
                    <h1>Clientes</h1>
                </div>
                <div class="col-md-3 col-sm-6">
                </div>
                <p></p>
                <div class="col-md-6 col-sm-6">
                    <form class="busca" method="POST" action="/searchClient">
                        @csrf
                        <div class="input-group">
                            <input name="filter" type="text" class="form-control"
                                placeholder="Nome ou e-mail do cliente">
                                <button value="{{ old('name') }}" type="submit" class="btn btn-secondary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div><!-- /input-group -->
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    @foreach ($clients as $client)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{$client->name}}</b></h2>
                                        <p class="text-muted text-sm"><b>Acesso: </b>{{$client->type}}</p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fa fa-check-square"></i></span> Status: {{$client->status}}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefone: {{$client->phone}}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></i></span> E-mail: {{$client->email}}</li>
                                            <li class="small"><span class="fa-li"><i class="fa fa-road"></i></span> {{$client->neighborhood}}, {{$client->city}}, {{$client->number}}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> {{$client->cnpj}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        @if($client->avatar)
                                            <img src="{{ url('storage/'.$client->avatar) }}"
                                            alt="user-avatar" class="showLogo img-circle img-fluid">
                                        @else
                                            <img src="{{ url('storage/avatarDefault.png') }}"
                                            alt="user-avatar" class="showLogo img-circle img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <button type="button" data-type="see" data-rout="{{ route ('seeClient', $client->id) }}" class="btn btn-sm bg-secondary modalConfirma">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <button type="button" data-type="edit" data-rout="{{ route ('editClient', $client->id) }}" class="btn btn-sm bg-primary modalConfirma">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" data-type="delete" data-rout="{{ route ('destroyClient', $client->id) }}" class="btn btn-sm bg-danger modalConfirma">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="card-footer">
               <div class="row">
                    <ul class="pagination justify-content-center m-0">
                        <a class="btn btn-success" href="/createdClient" role="button">Cadastrar</a>
                    </ul>
                    <ul class="pagination esqueciSenha">
                        @if (isset($filters))
                            {{$clients->appends($filters)->links()}}
                        @else
                            {{$clients->links()}}
                        @endif
                    </ul>
               </div>
            </div>
        </div>
    </section>
</div>
@endsection
