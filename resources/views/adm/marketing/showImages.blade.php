@extends('site.main')
@section('title', 'PainelADM - Gestão da marca')
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
                            <h4 class="card-title">Gestão da marca</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($images as $image)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="card-footer">
                                            <a data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                                                <img src="{{ url('storage/'.$image->path) }}" class="carouselImg img-fluid mb-2" alt="white sample"/>
                                            </a>
                                            <button type="button" data-type="delete" data-rout="{{ route ('destroyImage', $image->id) }}" class="btn btn-sm bg-danger modalConfirma">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        <p></p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                 <ul class="pagination justify-content-center m-0">
                                     <a class="btn btn-success" href="/createImage" role="button">Cadastrar</a>
                                 </ul>
                                 <ul class="pagination esqueciSenha">
                                     @if (isset($filters))
                                         {{$images->appends($filters)->links()}}
                                     @else
                                         {{$images->links()}}
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
