@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="nav-icon fas fa-user"></i> {{ __('Crear usuario') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">
                        <a href="{{ url("/users") }}">volver a la lista</a>
                    </li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<section class="content">
        <div class="container-fluid">
            @include('partials.message')

            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">

                        <!-- /.card-header -->
                        <div class="card-body">
                            {{ Form::open(['route' => 'users.store', 'method' => 'POST']) }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Nombre del usuario') }}</label>
                                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del usuario']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="email">{{ __('Email') }}</label>
                                            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="password">{{ __('Clave') }}</label>
                                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Clave']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="role">{{ __('Perfil') }}</label>
                                            {{ Form::select('role', $roles, null, ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                                            <a class="btn btn-secondary" href="{!! url('/users')  !!}" >{{ __('Cancelar') }}</a>
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
