<div>
    @if(($mostrarItemsDesglose == 1) or ($mostrarItemsDesglose == null))
        <livewire:budget::desglose.items :codigoProyecto="$codigoProyecto" />
    @else
        <livewire:budget::desglose.desglose :codigoProyecto="$codigoProyecto" :itemsId="$itemsId" />
        <livewire:budget::desglose.extras :codigoProyecto="$codigoProyecto" :itemsId="$itemsId" />
    @endif
</div>
