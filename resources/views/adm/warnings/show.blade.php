@extends('site.main')
@section('title', 'PainelADM - Avisos')
@section('content')

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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title">Avisos</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($warnings as $warning)
                                <div class="card card-danger col-md-4 col-sm-12">
                                    <div class="card-body">
                                        <div class="callout callout-{{$warning->class}}">
                                            <h5>{{$warning->title}} !!</h5>
                                            <p>{{$warning->content}}</p>
                                        </div>
                                        <p>
                                            <button type="button" data-type="delete" data-rout="{{ route ('destroyWarning', $warning->id) }}" class="btn btn-sm bg-danger modalConfirma">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                 <ul class="pagination justify-content-center m-0">
                                     <a class="btn btn-success" href="/createWarning" role="button">Cadastrar</a>
                                 </ul>
                                 <ul class="pagination esqueciSenha">
                                     @if (isset($filters))
                                         {{$warnings->appends($filters)->links()}}
                                     @else
                                         {{$warnings->links()}}
                                     @endif
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
