@extends('site.main')
@section('title', 'PainelADM - Cadastro de avisos')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content animate__animated animate__fadeIn">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                Cadastro de avisos
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="/storeWarning" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-6">
                                <label>*Título do aviso</label>
                                <input required type="text" minlength="5" class="form-control"
                                name="title" id="title" placeholder="Título do aviso" value="{{ old('title') }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>Cor do aviso</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input custom-control-input-info" value="info" type="radio" id="info" name="class" checked>
                                    <label for="info" class="custom-control-label">Azul</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input custom-control-input-danger" value="danger" type="radio" id="danger" name="class">
                                    <label for="danger" class="custom-control-label">Vermelho</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input custom-control-input-warning" value="warning" type="radio" id="warning" name="class">
                                    <label for="warning" class="custom-control-label">Amarelo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input custom-control-input-success" value="success" type="radio" id="success" name="class">
                                    <label for="success" class="custom-control-label">Verde</label>
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-6">
                                <label>*Descrição</label>
                                <textarea required id="content" name="content" class="form-control"
                                    placeholder="Descrição" value="{{ old('content') }}" style="height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-success" href="/showWarnings" role="button">Listar</a>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
