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
                <h1><i class="nav-icon fas fa-receipt "></i> {{ __('Items Presupuesto') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/client">Listado de clientes</a> </li>
                    <li class="breadcrumb-item"><a href="/client/{{$budget->contacts_id}}">Cliente</a> </li>
                </ol>

            </div>
        </div>
    </div><!-- /.container-fluid -->


<div class="container-fluid">
    <livewire:budget::ficha  :contactClient="$contactClient" :budget="$budget" />

    </div>
@endsection


@section('content')
    @php
        $codigoProyecto = $budget->correlative;
    @endphp

{{-- <livewire:budget::budget.abonado :budgetId="$budget_id" /> --}}

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12 col-sm-12">
                            <div class="card card-primary card-tabs">
                                <div class="card-header p-0 pt-1">
                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-one-desglose-tab" data-toggle="pill"
                                                href="#custom-tabs-one-desglose" role="tab" aria-controls="custom-tabs-one-desglose"
                                                aria-selected="true">Desglose</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-presupuesto-tab" data-toggle="pill"
                                                href="#custom-tabs-one-presupuesto" role="tab" aria-controls="custom-tabs-one-presupuesto"
                                                aria-selected="false">Presupuesto</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-abonos-tab" data-toggle="pill"
                                                href="#custom-tabs-one-abonos" role="tab" aria-controls="custom-tabs-one-abonos"
                                                aria-selected="false">Abonos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-gastos-tab" data-toggle="pill"
                                                href="#custom-tabs-one-gastos" role="tab" aria-controls="custom-tabs-one-gastos"
                                                aria-selected="false">Relación de gastos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-one-facturas-tab" data-toggle="pill"
                                                href="#custom-tabs-one-facturas" role="tab" aria-controls="custom-tabs-one-facturas"
                                                aria-selected="false">Factura</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-one-desglose" role="tabpanel"
                                            aria-labelledby="custom-tabs-one-desglose-tab">
                                            <livewire:budget::desglose.tab :codigoProyecto="$codigoProyecto"/>
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-presupuesto" role="tabpanel"
                                            aria-labelledby="custom-tabs-one-presupuesto-tab">
                                            <livewire:budget::pesupuesto :codigoProyecto="$codigoProyecto" />
                                            {{-- <livewire:budget::budget.items :codigoProyecto="$codigoProyecto" /> --}}
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-abonos" role="tabpanel"
                                            aria-labelledby="custom-tabs-one-abonos-tab">
                                            <livewire:budget::abonado :codigoProyecto="$codigoProyecto" />

                                            {{-- <livewire:budget::budget.items :budgetId="$budget_id" /> --}}
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-gastos" role="tabpanel"
                                            aria-labelledby="custom-tabs-one-gastos-tab">
                                            <livewire:budget::gastos :codigoProyecto="$codigoProyecto" />
                                            {{-- <livewire:budget::budget.items :budgetId="$budget_id" /> --}}
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-one-facturas" role="tabpanel"
                                            aria-labelledby="custom-tabs-one-facturas-tab">
                                            facturas
                                            {{-- <livewire:budget::budget.items :budgetId="$budget_id" /> --}}
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
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
    $('#create').modal('hide');
    $('#modalAddDesgloseItem').modal('hide');
    $('#modalAddDesgloseDesglose').modal('hide');
    $('#modalAddDesgloseExtras').modal('hide');
    $('#modalAddGastos').modal('hide');
    toastr.success("{{ __('Item creado correctamente') }}")

})
window.livewire.on('update', () => {
    $('#ItemsEdit').modal('hide');
    $('#modalEditDesgloseItem').modal('hide');
    $('#modalEditDesgloseDesglose').modal('hide');
    $('#modalEditDesgloseExtras').modal('hide');
    $('#modalEditPresupuesto').modal('hide');
    $('#modalEditGastos').modal('hide');
    toastr.success("{{ __('Item atualizado correctamente') }}")
})


</script>

@endsection
