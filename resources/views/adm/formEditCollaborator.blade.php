@extends('site.main')
@section('title', 'Alterando dados')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alterando dados</h1>
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
                            <label>*Nome</label>
                            <input type="text" minlength="10" required class="form-control"
                                name="name" id="name" placeholder="Nome do colaborador" value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                            <label>Celular</label>
                            <input type="text" onkeyup="mascara(this, mtel);" class="form-control"
                                name="phone" minlength="14" maxlength="15" id="phone" placeholder="Celular"
                                oninput="validaTelefone(this.value, this)" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                            <label>*E-mail</label>
                            <input type="email" minlength="10" required class="form-control"
                                name="email" id="email" placeholder="E-mail" value="{{ $user->email }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                            <label>Senha</label>
                            <input type="password" minlength="8" class="form-control" name="password"
                                id="password" placeholder="Senha">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                            <label>Repita a senha</label>
                            <input type="password" minlength="8" class="form-control" name="passwordRepit"
                                id="passwordRepit" oninput="validaSenha(this)" placeholder="Repita a senha">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*Tipo de permissão</label>
                                @if ($user->type == 'Usuario')
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Usuario" checked name="type">
                                        <label class="form-check-label">Usuário</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" value="Adm" type="radio" name="type">
                                        <label class="form-check-label">ADM</label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="Usuario" name="type">
                                        <label class="form-check-label">Usuário</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" value="Adm" checked type="radio" name="type">
                                        <label class="form-check-label">ADM</label>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                            <label class="control-label">Foto</label>
                            <input type="file" class="form-control-file" id="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
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
