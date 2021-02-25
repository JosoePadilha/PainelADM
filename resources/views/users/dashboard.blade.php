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
                </div>
                <div class="row">
                    @if (count($imagesMarketing) > 0)
                        <div class="col-md-7">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Imagens</h3>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            @foreach ($imagesMarketing as $item)
                                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}"
                                                    @if ($loop->index = 0)
                                                        class="active"
                                                    @endif
                                                ></li>
                                            @endforeach
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach ($imagesMarketing as $item)
                                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                    <img class="carouselImg d-block w-100" src="{{ url('storage/'.$item->path) }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                            <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-left"></i>
                                            </span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                            <span class="carousel-control-custom-icon" aria-hidden="true">
                                                <i class="fas fa-chevron-right"></i>
                                            </span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-5">
                        <div class="info-box bg-light">
                          <div class="info-box-content">
                            <span class="info-box-text text-center text-muted">Estimated budget</span>
                            <span class="info-box-number text-center text-muted mb-0">2300</span>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </section>
    </div>
@endsection
