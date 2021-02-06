@extends('site.main')
@section('title', 'Colaboradores')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Colaboradores</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    @foreach ($users as $user)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{$user->name}}</b></h2>
                                        <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="#" class="btn btn-sm bg-teal">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class="fas fa-user"></i> View Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                <ul class="pagination justify-content-center m-0">
                        @if (isset($filters))
                            {{$users->appends($filters)->links()}}
                        @else
                            {{$users->links()}}
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </section>
</div>
$2y$10$oXy4BYgxsDfVIIOtu2wCtugJyVODIAxOFvpFXCBOLQR9QBihw8bK6
@endsection


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
</div>
@endsection
