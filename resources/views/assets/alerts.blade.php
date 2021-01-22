<div class="modal fade" id="modalSuccess" role="dialog">
  <div class="modal-dialog modal-sm">
      <div class="alert alert-success text-alert" role="alert">
          <center><p><strong>Sucesso!!</strong></p>
            <hr>
              @if (session('success'))
                  <p>{{session('success')}}</p>
              @endif
          </center>
      </div>
  </div>
</div>

<div class="modal fade" id="modalErro"  role="dialog">
  <div class="modal-dialog modal-sm">
      <div class="modal-dialog modal-sm">
          <div class="alert alert-danger text-alert" role="alert">
              <center><p><strong>Opss!!</strong></p>
                <hr>
                  @if (session('error'))
                      <p>{{session('error')}}</p>
                  @else
                      @if ($errors->any())
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{$error}}</li>
                              @endforeach
                          </ul>
                      @endif
                  @endif
              </center>
          </div>
      </div>
  </div>
</div>

@if (session('success'))
  <script>
    $( document ).ready(function() {
      $('#modalSuccess').modal('show');
        setTimeout(function () {
        $('#modalSuccess').modal('hide')
          }, 3000);
    });
  </script>
@else
  @if (session('error'))
    <script>
      $( document ).ready(function() {
        $('#modalErro').modal('show');
          setTimeout(function () {
          $('#modalErro').modal('hide')
           }, 3000);
        });
    </script>
  @else
    @if ($errors->any())
      <script>
        $( document ).ready(function() {
          $('#modalErro').modal('show');
          setTimeout(function () {
            $('#modalErro').modal('hide')
              }, 3000);
          });
      </script>
    @endif
  @endif
@endif
