<!DOCTYPE html>

@include('assets.header')

<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Painel</b> ADM</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Esqueceu sua senha? Informe seu e-mail para recuperar.</p>
    
          <form action="#" method="post">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Recuperar senha</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
          <p class="mt-3 mb-1">
            <a href="/">Fazer login</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    @include('assets.scriptsFooter')
</body>
</html>