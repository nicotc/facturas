<div>
    @if(($mostrarCostos == 1) or ($mostrarCostos == null))
        <livewire:budget::gastos :codigoProyecto="$codigoProyecto" />
    @else
        <livewire:budget::gastos-detalles :codigoProyecto="$codigoProyecto"  :costosId="$costosId" />
    @endif
</div>
