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
                    <form class="busca" method="POST" action="/searchClientsActive">
                        @csrf
                        <div class="input-group">
                            <input name="filter" type="text" class="form-control"
                                placeholder="Nome ou e-mail do cliente">
                                <button type="submit" class="btn btn-secondary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div><!-- /input-group -->
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach ($clients as $client)
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if($client->avatar)
                                            <img src="{{ url('storage/'.$client->avatar) }}"
                                            alt="user-avatar" class="profile-user-img img-fluid img-circle">
                                        @else
                                            <img src="{{ url('storage/avatarDefault.png') }}"
                                            alt="user-avatar" class="profile-user-img img-fluid img-circle">
                                        @endif
                                </div>

                                <h3 class="profile-username text-center">{{$client->name}}</h3>

                                <p class="text-muted text-center">{{$client->city}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>CNPJ</b> <a class="float-right">{{$client->cnpj}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Telefone</b> <a class="float-right">{{$client->phone}}</a>
                                    </li>
                                </ul>
                                <a href="#" class="btn btn-success btn-block"><b>Selecionar</b></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
