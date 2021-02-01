@extends('site.main')
@section('title', 'Colaboradores')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-3 col-sm-6">
                    <h1>Colaboradores</h1>
                </div>
                <div class="col-md-3 col-sm-6">
                </div>
                <p></p>
                <div class="col-md-6 col-sm-6">
                    <form class="busca" method="POST" action="/searchCollaborator">
                        @csrf
                        <div class="input-group">
                            <input name="filter" type="text" class="form-control"
                                placeholder="Nome ou e-mail do colaborador">
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
                    @foreach ($users as $user)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{$user->name}}</b></h2>
                                        <p class="text-muted text-sm"><b>Acesso: </b>{{$user->type}}</p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> Status: {{$user->status}}</li>
                                            <p></p>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Telefone: {{$user->phone}}</li>
                                            <p></p>
                                            <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></i></span> E-mail: {{$user->email}}</li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        @if($user->avatar)
                                            <img src="{{ url('storage/'.$user->avatar) }}"
                                            alt="user-avatar" class="img-circle img-fluid">
                                        @else
                                            <img src="{{ url('storage/avatarDefault.png') }}"
                                            alt="user-avatar" class="img-circle img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <button type="button" data-type="edit" data-rout="{{ route ('editCollaborator', $user->id) }}" class="btn btn-sm bg-primary modalConfirma">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    @if (Auth::user()->id != $user->id)
                                        <button type="button" data-type="delete" data-rout="{{ route ('destroyCollaborator', $user->id) }}" class="btn btn-sm bg-danger modalConfirma">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    @endif

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
                        <a class="btn btn-success" href="/createdCollaborator" role="button">Cadastrar</a>
                    </ul>
                    <ul class="pagination esqueciSenha">
                        @if (isset($filters))
                            {{$users->appends($filters)->links()}}
                        @else
                            {{$users->links()}}
                        @endif
                    </ul>
               </div>
            </div>
        </div>
    </section>
</div>
@endsection
