@extends('site.main')
@section('title', 'PainelADM - Visualisando dados')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Visualisando dados</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

    <section class="content">
    <div class="container-fluid">
        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                <form action="{{ route ('collaboratorEdit', $user->id) }}" enctype="multipart/form-data" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-3 col-sm-6">
                                <a href="" class="brand-link">
                                    @if($user->avatar)
                                        <img alt="Logo" class="logo img-circle elevation-3" src="{{ url('storage/'.$user->avatar) }}">
                                    @else
                                        <img alt="Logo" class="logo img-circle elevation-3" style="opacity: .8" src="{{ url('storage/avatarDefault.png') }}" alt="logo">
                                    @endif
                                </a>
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                            <label>Nome</label>
                            <input disabled type="text" minlength="10" required class="form-control"
                                name="name" id="name" placeholder="Nome do colaborador" value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                            <label>Celular</label>
                            <input disabled type="text" onkeyup="mascara(this, mtel);" class="form-control"
                                name="phone" minlength="14" maxlength="15" id="phone" placeholder="Celular"
                                oninput="validaTelefone(this.value, this)" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                            <label>E-mail</label>
                            <input disabled type="email" minlength="10" required class="form-control"
                                name="email" id="email" placeholder="E-mail" value="{{ $user->email }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>Tipo de permissão</label>
                                @if ($user->type == 'Usuario')
                                    <div class="form-check">
                                        <input disabled class="form-check-input" type="radio" value="Usuario" checked name="type">
                                        <label class="form-check-label">Usuário</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input disabled class="form-check-input" value="Adm" type="radio" name="type">
                                        <label class="form-check-label">ADM</label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input disabled class="form-check-input" type="radio" value="Usuario" name="type">
                                        <label class="form-check-label">Usuário</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input disabled class="form-check-input" value="Adm" checked type="radio" name="type">
                                        <label class="form-check-label">ADM</label>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>Status</label>
                                @if ($user->status == 'Ativo')
                                    <div class="custom-control custom-radio">
                                        <input disabled class="custom-control-input custom-control-input-primary" value="Ativo" type="radio" id="status1" name="status" checked>
                                        <label for="status1" class="custom-control-label">Ativo</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input disabled class="custom-control-input custom-control-input-danger" value="Inativo" type="radio" id="status2" name="status">
                                        <label for="status2" class="custom-control-label">Inativo</label>
                                    </div>
                                @else
                                    <div class="custom-control custom-radio">
                                        <input disabled class="custom-control-input custom-control-input-primary" value="Ativo" type="radio" id="status1" name="status">
                                        <label for="status1" class="custom-control-label">Ativo</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input disabled class="custom-control-input custom-control-input-danger" value="Inativo" type="radio" id="status2" name="status" checked>
                                        <label for="status2" class="custom-control-label">Inativo</label>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-success" href="/showCollaborator" role="button">Listar</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    </section>
</div>
@endsection
