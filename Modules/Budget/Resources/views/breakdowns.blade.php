@extends('layouts.app')

@section('custom-css')
<style>
textarea {
resize: none;
}
</style>
@endsection

@section('content-header')
<section class="content-header">
<div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="nav-icon fas fa-receipt "></i> {{ __('Desglose Presupuesto') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/client">Listado de clientes</a> </li>
                    <li class="breadcrumb-item"><a href="/client/{{$budget->contacts_id}}">Cliente</a> </li>
                    <li class="breadcrumb-item"><a href="/budget/showItems/{{ $budget->id }}">Items Presupuesto</a> </li>
                </ol>

            </div>
        </div>
    </div>
<div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card callout callout-success">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <b>Nombre y apellido o razón social:</b>
                            </div>
                            <div class="col-3">
                                {{ $contactClient->name }}
                            </div>
                            <div class="col-3">
                                <b>Descripción del item:</b>
                            </div>
                            <div class="col-3">
                                {{ $budgetItems->description }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Domicilio fiscal:</b>
                            </div>
                            <div class="col-3">
                                {{ $contactClient->address }}
                            </div>
                            <div class="col-3">
                                <b>Cantidad:</b>
                            </div>
                            <div class="col-3">
                                {{ $budgetItems->quantity }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Teléfono:</b>
                            </div>
                            <div class="col-3">
                                {{ $contactClient->phone }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Direccion de la obra</b>
                            </div>
                            <div class="col-3">
                                {{-- {{ $budget->contacts_address_id }} --}}
                                {{ $budget->AddressName }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <b>Tipo de servicio:</b>
                            </div>
                            <div class="col-3">
                                {{-- {{ $budget->services_id }} --}}
                                {{ $budget->ServiceName }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @php
                            $budget_items_id = $budgetItems->id;
                        @endphp
                        <livewire:budget::budget.breakdown :budgetItems="$budget_items_id" />
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @php
                        $budget_items_id = $budgetItems->id;
                        @endphp
                        <livewire:budget::budget.extras :budgetItems="$budget_items_id" />
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


  window.livewire.on('create', () => {
$('#Desglosecreate').modal('hide');
toastr.success("{{ __('Desglose creado correctamente') }}")

})
window.livewire.on('update', () => {
$('#Desgloseedit').modal('hide');
toastr.success("{{ __('Desglose atualizado correctamente') }}")
})


</script>

@endsection
