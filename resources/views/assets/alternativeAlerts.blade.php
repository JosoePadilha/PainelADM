@if (session('success'))
      <div class="alert alert-success">
          <p>{{session('success')}}</p>
      </div>
    @else
      @if (session('error'))
        <div class="alert alert-danger">
            <p>{{session('error')}}</p>
        </div>
      @else
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach                            
            </ul>                        
          </div>
        @endif    
    @endif
@endif