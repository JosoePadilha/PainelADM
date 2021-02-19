@extends('site.main')
@section('title', 'PainelADM - Documentos vencidos')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Documentos Vencidos</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content animate__animated animate__fadeInUp">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Data vencimento</th>
                                <th>Documento</th>
                                <th>Selecionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{date('d/m/Y', strtotime($data->dueDate))}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>
                                        <a data-type="document" data-rout="{{ route ('formDocument', $data->id) }}"
                                            type="button" data-dismiss="modal" class="btn btn-primary modalConfirma">
                                            <i class="fas fa-paper-plane"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">

             </div>
        </div>
    </section>
</div>
@endsection
