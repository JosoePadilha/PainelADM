@extends('site.main')
@section('title', 'Dashboard')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content animate__animated animate__fadeIn">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$numberDocuments}}</h3>
                                <p>Documentos vencidos</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-folder-open"></i>
                            </div>
                            <a href="/showDocumentsVanquished" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$numberClients}}</h3>
                                <p>Total de clientes</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-handshake"></i>
                            </div>
                            <a href="/showClients" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$numberUsers}}</h3>
                                <p>Total de colaboradores</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="/showCollaborator" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$numberProducts}}</h3>
                                <p>Total de produtos</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-swimming-pool"></i>
                            </div>
                            <a href="/showProducts" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 col-sm-6">
                        @include('adm.marketing.carousel')
                    </div>
                    <div class="col-md-5 col-sm-6">
                        @include('adm.warnings.showWarnings')
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
