@extends('site.main')
@section('title', 'PainelADM - Relação de documentos')
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
        </div>
    </section>

    <section class="content animate__animated animate__fadeIn">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            Relação de documentos
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Documento</th>
                                        <th>Emissão</th>
                                        <th>Vencimento</th>
                                        <th>Status</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $document)
                                        <tr>
                                            <td>{{$document->title}}</td>
                                            <td>{{date('d/m/Y', strtotime($document->created_at))}}</td>
                                            <td>@if ($document->dueDate <> NULL)
                                                {{date('d/m/Y', strtotime($document->dueDate))}}
                                            @else
                                                    ---
                                            @endif
                                            </td>
                                            <td class="text-right py-0 align-middle">
                                                <div class="btn-group btn-group-sm positionBadge">
                                                    @if ((date("Y-m-d")) > $document->dueDate && $document->dueDate <> NULL)
                                                        <span class="badge badge-danger">Vencido</span>
                                                    @else
                                                        @if ($document->dueDate <> NULL)
                                                            <span class="badge badge-success">Válido</span>
                                                        @else
                                                            ---
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ route ('download', $document->document) }}"
                                                    type="button" class="btn btn-default modalConfirma">
                                                    <i class="fas fa-download"></i>
                                                </a>
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
