@if (count($warnings) > 0)
<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-bullhorn"></i>
                Avisos
        </h3>
    </div>
@endif
    @foreach ($warnings as $warning)
        <div class="card-body">
            <div class="callout callout-{{$warning->class}}">
                <h5>{{$warning->title}}!</h5>
                <p>{{$warning->content}}</p>
            </div>
        </div>
    @endforeach
</div>
