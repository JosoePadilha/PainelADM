@extends('site.main')
@section('title', 'PainelADM - Emissão de documento')
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
                            Cadastro de produtos
                        </div>
                        <form action="/storeProduct" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-3 col-sm-12">
                                        <label>*Nome do produto</label>
                                        <input type="text" required minlength="5" class="form-control"
                                            name="name" value="{{ old('name') }}" id="name"
                                            placeholder="Nome do produto">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-12">
                                        <label>*Valor R$</label>
                                        <input type="text" required class="form-control" name="price"
                                        id="price" value="{{ old('price') }}" onkeyup="formatarMoeda()"
                                        placeholder="Valor do oproduto R$" minlength="4">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6">
                                        <div class="form-group">
                                            <label>*Família do Produto</label>
                                                <select required id="family_id" name="family_id"  class="form-control">
                                                    <option></option>
                                                        @foreach($familysProducts as $family)
                                                            <option
                                                            value="{{$family->id}}">{{$family->name}}</option>
                                                        @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6">
                                        <label class="control-label">Foto</label>
                                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a class="btn btn-success" href="/showProducts" role="button">Listar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-sm-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Famílias de produtos</h3>
                            <div class="card-tools">
                                <button class="btn btn-tool" type="button" data-toggle="collapse" data-target="#bodyCard" aria-expanded="false" aria-controls="bodyCard">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="collapse" id="bodyCard">
                            <div class="card-body">
                                <form action="/storeFamily" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-sm-12">
                                            <label>*Nome família de produtos</label>
                                            <input type="text" required minlength="5" class="form-control"
                                                name="name" id="name" placeholder="Nome da família de produtos" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
