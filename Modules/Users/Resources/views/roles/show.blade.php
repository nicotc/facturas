@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __('Roles show') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">
                        <a href="{{ route('roles.index') }}">{{ __('Roles List') }}</a>
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
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    {{ $role->name }}
                                </div>
                            </div>
                        </div>
                        <div class="row">

                                @forelse ($permissions as $permissionkey => $permissionValue)
                                <div class="col-3">
                                    <div class="card">
                                        <div class="card-header">
                                            {{ strtoupper($permissionkey)}}
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group">
                                                @foreach ($permissionValue as $permission_id => $permission_name)
                                                <li class="list-group-item">
                                                    {{-- {{ Form::checkbox('permissions[]', $permission_id, null, ['class' => 'name']) }} --}}
                                                    {{$permission_name}}
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p>{{ __('Este rol no tiene permisos') }}</p>
                                @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Eliminar Usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body…</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light bg-primary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-light bg-danger" data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
@endsection
