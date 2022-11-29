@extends('layouts.app')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="nav-icon fas fa-user"></i> {{ __('Listado de usuarios') }}</h1>
                </div>
                <div class="col-sm-6">

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
                        <livewire:users::users />
                    </div>
                </div>
            </div>
        </div>
    </section>

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
