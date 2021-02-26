@if (count($imagesMarketing) > 0)
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
@endif
