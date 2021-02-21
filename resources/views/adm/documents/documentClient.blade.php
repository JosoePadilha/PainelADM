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
                <div class="col-md-5 col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                        </div>
                        <form action="{{ route ('documentStore', $client->id) }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>*Título documento</label>
                                        <input type="text" required minlength="5" class="form-control"
                                            name="title" value="{{ old('title') }}" id="title" placeholder="Título documento">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label>*Data vencimento</label>
                                        <input type="text" name="dueDate" id="dueDate" required onblur="javascript: validarData(this.value, this);"
                                            class="form-control" data-mask="00/00/0000" value="{{ old('dueDate') }}" min="01/01/2020" placeholder="* Data de vencimento">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <div class="btn btn-default btn-file col start">
                                            <i class="fas fa-paperclip"></i> Anexar
                                            <input required id="document" type="file" name="document">
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
                <div class="col-md-7 col-sm-6">
                    <div class="card card-secondary">
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
                                        <th>Emissão</th>
                                        <th>Vencimento</th>
                                        <th>Status</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $document)
                                        <tr>
                                            <td>{{$document->title}}</td>
                                            <td>{{date('d/m/Y', strtotime($document->created_at))}}</td>
                                            <td>{{date('d/m/Y', strtotime($document->dueDate))}}</td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    @if ((date("Y-m-d")) > $document->dueDate)
                                                        <a type="button" class="btn btn-danger"><i class="fas fa-lg fa-times"></i></a>
                                                    @else
                                                        <a type="button" class="btn btn-success"><i class="fas fa-check"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                    <a data-type="delete" data-rout="{{ route ('destroyDocument', $document->id) }}"
                                                        type="button" data-dismiss="modal" class="btn btn-danger modalConfirma">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <a href="{{ route ('download', $document->document) }}"
                                                        type="button" class="btn btn-default modalConfirma">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <ul class="pagination esqueciSenha">
                                    {{$documents->links()}}
                                </ul>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
