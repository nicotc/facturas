@extends('layouts.app')

@section('content-header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-address-book text-info"></i> {{ __('Listado de Clientes') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">List</li>
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
                        <livewire:contact::contact.client />
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
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
                    <button type="button" class="btn btn-outline-light bg-danger" data-dismiss="modal" >Eliminar</button>
                </div>
            </div>
        </div>
    </div> --}}
@endsection


@section('js')

<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    @php
        if(session('flash_notification', collect())->toArray() != null){
            $flash = session('flash_notification', collect())->toArray();
            $flash = $flash[0];
            $type = $flash['level'];
            $message = $flash['message'];
            switch ($type) {
                case 'success':
                @endphp
                    toastr.success("{{$message}}")
                @php
                break;
                case 'error':
                @endphp
                    toastr.error("{{$message}}")
                @php
                break;
            }
        }
    @endphp
  });
</script>

@endsection

