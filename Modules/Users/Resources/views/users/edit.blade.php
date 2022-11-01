@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="nav-icon fas fa-user"></i> {{ __('Editar usuario') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="{{ url("/users") }}">volver a la lista</a>
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
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            {{ Form::open(['route' => ['users.update', $user->id] , 'method' => 'put']) }}
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Nombre') }}</label>
                                            {{  Form::hidden("id", $user->id) }}
                                            {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="email">{{ __('Email') }}</label>
                                            {{ Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="email">{{ __('Clave') }}:  </label><span> Si se llena este campo se cambiara la clave, de lo contrario se mantendra la misma clave </span>
                                                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Clave']) }}
                                                </div>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="role">{{ __('Perfil') }}</label>
                                            {{ Form::select('role', $roles, $user->roles->pluck('id'), ['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                                            <a class="btn btn-secondary" href="{!! url('/users') !!}" >{{ __('Cancelar') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
