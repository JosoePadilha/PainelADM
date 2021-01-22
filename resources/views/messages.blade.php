<div class="modal fade" id="modalErro"  role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="alert alert-danger" role="alert">
                <center><p><strong>Eii mann!!</strong></p>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            {{$error}}<br>
                        @endforeach                            
                    @endif
                </center>
            </div>
        </div>
    </div>
</div>