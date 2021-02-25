@extends('site.main')
@section('title', 'PainelADM - Gestão da marca')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content animate__animated animate__fadeIn">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            Gestão da marca
                        </div>
                        <form action="/storeImage" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-6">
                                        <label>*Nome da imagem</label>
                                        <input type="text" minlength="5" class="form-control"
                                            name="name" id="name" placeholder="Nome da imagem" value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6">
                                        <label class="control-label">*Imagem</label>
                                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a class="btn btn-success" href="/showImages" role="button">Listar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
