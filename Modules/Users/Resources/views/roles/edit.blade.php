@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="nav-icon fas fa-user-cog"></i> {{ __('Editar nivel de acceso al sistema') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">
                       <a href="{{ url("/roles") }}">volver a la lista</a>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('roles.update', ["role" =>$role->id]) }}" method="post" >
                        {{ method_field('put') }}
                        @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">{{ __('Perfil') }}</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">


                                    @forelse ($permissions as $permissionkey => $permissionValue)
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-header">
                                              {{ trans('interfaz.'.$permissionkey) }}
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-group">
                                                    @foreach ($permissionValue as $permission_id => $permission_name)
                                                    <li class="list-group-item">
                                                        {{ Form::checkbox('permissions[]', $permission_id, $role->permissions->contains($permission_id), ['class' => 'name']) }}
                                                        {{trans('interfaz.'.$permission_name)}}
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <p>{{ __('No permissions found') }}</p>
                                    @endforelse



                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                                        <a class="btn btn-secondary" href="{{ url("/roles") }}">{{ __('Cancelar') }}</a>
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
