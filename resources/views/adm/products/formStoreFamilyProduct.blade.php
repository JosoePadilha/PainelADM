@extends('site.main')
@section('title', 'PainelADM - Cadastro de família')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastro de família de produtos</h1>
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
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <form action="/storeFamily" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                            <label>*Nome</label>
                            <input type="text" required minlength="5" class="form-control"
                                name="name" id="name" placeholder="Nome da família de produtos" value="{{ old('name') }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-success" href="/showFamily" role="button">Listar</a>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
