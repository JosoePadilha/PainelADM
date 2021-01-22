@extends('site.main')
@section('title', 'Colaboradores')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Colaboradores</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
            @foreach ($users as $user)
                <div class="col-md-3">
                    <!-- general form elements -->
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                        <div class="text-center">
                            @if($user->avatar)
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ url('storage/'.$user->avatar) }}"
                                    alt="User profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ url('storage/avatarDefault.png') }}"
                                    alt="User profile picture">
                            @endif

                        </div>

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <p class="text-muted text-center">{{$user->type}}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                            <b>E-mail</b> <a class="float-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                            <b>Telefone</b> <a class="float-right">{{$user->phone}}</a>
                            </li>
                            <li class="list-group-item">
                            <b>Status</b> <a class="float-right">{{$user->status}}</a>
                            </li>
                        </ul>

                        <center>
                            <button type="button" data-type="edit" data-rout="#" class="btn btn-primary modalConfirma"><i class="fa fa-edit"></i></button>
                            <button type="button" data-type="delete" data-rout="#" class="btn btn-danger modalConfirma"><i class="fa fa-trash"></i></button>
                        </center>


                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </section>
  </div>
@endsection
