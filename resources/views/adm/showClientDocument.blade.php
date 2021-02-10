@extends('site.main')
@section('title', 'PainelADM - Clientes')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-3 col-sm-6">
                    <h1>Clientes</h1>
                </div>
                <div class="col-md-3 col-sm-6">
                </div>
                <p></p>
                <div class="col-md-6 col-sm-6">
                    <form class="busca" method="POST" action="/searchClientsActive">
                        @csrf
                        <div class="input-group">
                            <input name="filter" type="text" class="form-control"
                                placeholder="Nome do cliente">
                                <button type="submit" value="{{ old('name') }}" class="btn btn-secondary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div><!-- /input-group -->
                    </form>
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
                                <th>CNPJ</th>
                                <th>E-mail</th>
                                <th>Envio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->cnpj}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>
                                        <a data-type="document" data-rout="{{ route ('formDocument', $client->id) }}"
                                            type="button" data-dismiss="modal" class="btn btn-primary modalConfirma">
                                            <i class="fas fa-paper-plane"></i>
                                        </a>
                                        <a data-type="document" data-rout="{{ route ('formDocument', $client->id) }}"
                                            type="button" data-dismiss="modal" class="btn btn-info modalConfirma">
                                            <i class="fas fa-paperclip"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                     <ul class="pagination esqueciSenha">
                         @if (isset($filters))
                             {{$clients->appends($filters)->links()}}
                         @else
                             {{$clients->links()}}
                         @endif
                     </ul>
                </div>
             </div>
        </div>
    </section>
</div>
@endsection
