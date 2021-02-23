@extends('site.main')
@section('title', 'PainelADM - Alterando dados')
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
                Alterando dados
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                <form action="{{ route ('clientEdit', $client->id) }}" enctype="multipart/form-data" method="post">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-6">
                                <label>*Nome empresa</label>
                                <input type="text" required minlength="5" class="form-control"
                                name="name" id="name" placeholder="Nome da empresa" value="{{ $client->name }}">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label>*Razão social</label>
                                <input type="text" required minlength="10" class="form-control"
                                name="socialReason" id="socialReason" placeholder="Razão social" value="{{ $client->socialReason }}">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label>*CNPJ</label>
                                <input type="text" required minlength="18" maxlength="18" class="form-control"
                                name="cnpj" id="cnpj" onkeyup="mascara(this, cnpj_mask);"
                                onblur="javascript: validarCNPJ(this.value, this);"
                                placeholder="CNPJ" value="{{ $client->cnpj }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*Telefone</label>
                                <input type="text" required onkeyup="mascara(this, mtel);" class="form-control"
                                name="phone" minlength="14" maxlength="14" id="phone" placeholder="Telefone"
                                oninput="validaTelefone(this.value, this)" value="{{ $client->phone }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>Celular</label>
                                <input type="text" onkeyup="mascara(this, mtel);" class="form-control"
                                name="celPhone" minlength="14" maxlength="15" id="celPhone" placeholder="Celular"
                                oninput="validaTelefone(this.value, this)" value="{{ $client->celPhone }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*E-mail</label>
                                <input type="email" minlength="10" required class="form-control"
                                name="email" id="email" placeholder="E-mail" value="{{ $client->email }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*Cidade</label>
                                <input type="text" minlength="5" required class="form-control"
                                name="city" id="city" placeholder="Cidade" value="{{ $client->city }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*Estado</label>
                                <input type="text" minlength="5" required class="form-control"
                                name="state" id="state" placeholder="Estado" value="{{ $client->state }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>*Bairro</label>
                                <input type="text" required minlength="5" class="form-control"name="neighborhood"
                                id="neighborhood" placeholder="Bairro" value="{{ $client->neighborhood }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>Número</label>
                                <input type="text" class="form-control" name="number" id="number"
                                placeholder="Número" value="{{ $client->number }}">
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label>Status</label>
                                @if ($client->status == 'Ativo')
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-primary" value="Ativo" type="radio" id="status1" name="status" checked>
                                        <label for="status1" class="custom-control-label">Ativo</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-danger" value="Inativo" type="radio" id="status2" name="status">
                                        <label for="status2" class="custom-control-label">Inativo</label>
                                    </div>
                                @else
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-primary" value="Ativo" type="radio" id="status1" name="status">
                                        <label for="status1" class="custom-control-label">Ativo</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-danger" value="Inativo" type="radio" id="status2" name="status" checked>
                                        <label for="status2" class="custom-control-label">Inativo</label>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group col-md-3 col-sm-6">
                                <label class="control-label">Imagem</label>
                                <input type="file" class="form-control-file" id="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a class="btn btn-success" href="/showClients" role="button">Listar</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    </section>
</div>
@endsection
