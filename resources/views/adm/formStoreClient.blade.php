@extends('site.main')
@section('title', 'Dashboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastro de cliente</h1>
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
                <form action="/clientStore" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-6">
                                <label>*Nome empresa</label>
                                <input type="text" required minlength="10" class="form-control"
                                name="name" id="name" placeholder="Nome da empresa" value="{{ old('name') }}">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label>*Razão social</label>
                                <input type="text" required minlength="10" class="form-control"
                                name="socialReason" id="socialReason" placeholder="Razão social" value="{{ old('socialReason') }}">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label>*CNPJ</label>
                                <input type="text" required minlength="18" maxlength="18" class="form-control"
                                name="cnpj" id="cnpj" onkeyup="mascara(this, cnpj_mask);"
                                onblur="javascript: validarCNPJ(this.value, this);"
                                placeholder="CNPJ" value="{{ old('cnpj') }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*Telefone</label>
                                <input type="text" required onkeyup="mascara(this, mtel);" class="form-control"
                                name="phone" minlength="14" maxlength="14" id="phone" placeholder="Telefone"
                                oninput="validaTelefone(this.value, this)" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>Celular</label>
                                <input type="text" required onkeyup="mascara(this, mtel);" class="form-control"
                                name="celPhone" minlength="14" maxlength="15" id="celPhone" placeholder="Celular"
                                oninput="validaTelefone(this.value, this)" value="{{ old('celPhone') }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*E-mail</label>
                                <input type="email" minlength="10" required class="form-control"
                                name="email" id="email" placeholder="E-mail" value="{{ old('email') }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*Cidade</label>
                                <input type="text" minlength="5" required class="form-control"
                                name="city" id="city" placeholder="Cidade" value="{{ old('city') }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*Estado</label>
                                <input type="text" minlength="5" required class="form-control"
                                name="state" id="state" placeholder="Estado" value="{{ old('state') }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*Bairro</label>
                                <input type="text" minlength="5" class="form-control"name="neighborhood"
                                id="neighborhood" placeholder="Bairro" value="{{ old('neighborhood') }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>Número</label>
                                <input type="text" class="form-control" name="number" id="number"
                                placeholder="Número" value="{{ old('number') }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*Senha</label>
                                <input type="password" minlength="8" required class="form-control" name="password"
                                id="password" placeholder="Senha" value="{{ old('passwordRepit') }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*Repita a senha</label>
                                <input type="password" minlength="8" required class="form-control" name="password_confirmation"
                                id="password_confirmation" oninput="validaSenha(this)" placeholder="Repita a senha"
                                value="{{ old('passwordRepit') }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label">Imagem</label>
                                <input type="file" class="form-control-file" id="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-success" href="#" role="button">Listar</a>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
