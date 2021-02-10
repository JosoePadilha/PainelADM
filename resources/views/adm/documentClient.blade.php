@extends('site.main')
@section('title', 'PainelADM - Emissão de documento')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Emissão de documento</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content animate__animated animate__fadeIn">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                        </div>
                        <form action="#" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>*Título documento</label>
                                        <input type="text" required minlength="5" class="form-control"
                                            name="nameDocument" id="nameDocument" placeholder="Título documento">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>*Data vencimento</label>
                                        <input type="date" required minlength="8" class="form-control"
                                            name="dueDate" id="dueDate">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="btn btn-default btn-file">
                                            <i class="fas fa-paperclip"></i> Anexar
                                            <input id="document" type="file" name="document">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a class="btn btn-success" href="/showClientDocument" role="button">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Documentos anteriores</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Data</th>
                                        <th>Status</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Teste</td>
                                        <td>Teste</td>
                                        <td>Vencido</td>
                                        <td>
                                            <a data-type="document" data-rout=""
                                                type="button" data-dismiss="modal" class="btn btn-primary modalConfirma">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a data-type="document" data-rout=""
                                                type="button" data-dismiss="modal" class="btn btn-danger modalConfirma">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Teste</td>
                                        <td>Teste</td>
                                        <td>Válido</td>
                                        <td>
                                            <a data-type="document" data-rout=""
                                                type="button" data-dismiss="modal" class="btn btn-primary modalConfirma">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a data-type="document" data-rout=""
                                                type="button" data-dismiss="modal" class="btn btn-danger modalConfirma">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Teste</td>
                                        <td>Teste</td>
                                        <td>Válido</td>
                                        <td>
                                            <a data-type="document" data-rout=""
                                                type="button" data-dismiss="modal" class="btn btn-primary modalConfirma">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a data-type="document" data-rout=""
                                                type="button" data-dismiss="modal" class="btn btn-danger modalConfirma">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
