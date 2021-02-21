@extends('site.main')
@section('title', 'PainelADM - Produtos')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6 col-sm-6">
                    <h1>Produtos</h1>
                </div>
                <p></p>
                <div class="col-md-6 col-sm-6">
                    <form class="busca" method="POST" action="/searchFamily">
                        @csrf
                        <div class="input-group">
                            <input name="filter" type="text" class="form-control"
                                placeholder="Nome da família">
                                <button type="submit" value="{{ old('name') }}"
                                class="btn btn-secondary" type="button"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                        </div>
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
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th>R$</th>
                                <th>Família</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->avatar}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        <a data-type="edit" data-rout="{{ route ('editFamily', $product->id) }}"
                                            type="button" data-dismiss="modal" class="btn btn-primary modalConfirma">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a data-type="delete" data-rout="{{ route ('destroyFamily', $product->id) }}"
                                            type="button" data-dismiss="modal" class="btn btn-danger modalConfirma">
                                            <i class="fas fa-trash"></i>
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
                    <ul class="pagination justify-content-center m-0">
                        <a class="btn btn-success" href="/createFamily" role="button">Cadastrar</a>
                    </ul>
                     <ul class="pagination esqueciSenha">
                         @if (isset($filters))
                             {{$products->appends($filters)->links()}}
                         @else
                             {{$products->links()}}
                         @endif
                     </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
