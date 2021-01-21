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
              <form>
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-4 col-sm-6">
                      <label>*Nome empresa</label>
                      <input type="text" required class="form-control" name="name" id="name" placeholder="Nome da empresa">
                    </div>                    
                    <div class="form-group col-md-4 col-sm-6">
                      <label>*Razão social</label>
                      <input type="text" required class="form-control" name="docialReason" id="docialReason" placeholder="Razão social">
                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                      <label>*CNPJ</label>
                      <input type="text" required class="form-control" name="cnpj" id="cnpj" placeholder="CNPJ">
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                      <label>*Telefone</label>
                      <input type="text" required class="form-control" name="phone" id="phone" placeholder="Telefone">
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                      <label>Celular</label>
                      <input type="text" class="form-control" name="celPhone" id="celPhone" placeholder="Celular">
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                      <label>*E-mail</label>
                      <input type="email" required class="form-control" name="email" id="email" placeholder="E-mail">
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                      <label>*Cidade</label>
                      <input type="text" required class="form-control" name="city" id="city" placeholder="Cidade">
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                      <label>Bairro</label>
                      <input type="text" class="form-control" name="neighborhood" id="neighborhood" placeholder="Bairro">
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                      <label>Número</label>
                      <input type="text" class="form-control" name="number" id="number" placeholder="Número">
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                      <label>*Senha</label>
                      <input type="password" required class="form-control" name="password" id="password" placeholder="Senha">
                    </div>
                    <div class="form-group col-md-3 col-sm-6">
                      <label>*Repita a senha</label>
                      <input type="password" required class="form-control" name="passwordRepit" id="passwordRepit" placeholder="Repita a senha">
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-sm-6">
                    <label class="control-label">Imagem</label>
                    <input type="file" class="form-control-file" id="avatar" name="avatar">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>          
        </div>
      </div>
    </section>
  </div>
@endsection