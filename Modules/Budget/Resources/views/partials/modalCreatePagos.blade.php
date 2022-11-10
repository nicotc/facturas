<div wire:ignore.self  class="modal fade" id="crateAbonos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-olive">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="address">Fecha</label>
                    <input type="date" wire:model="fecha" class="form-control" id="fecha" placeholder="Fecha">
                    @error('fecha') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="monto">Monto</label>
                    <input type="number" wire:model="monto" class="form-control" id="monto" placeholder="Monto">
                    @error('monto') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="type">Forma de pago</label>
                    <select wire:model="forma_pago" class="form-control" id="forma_pago">
                        <option value="Efectivo">Efectivo</option>
                        <option value="Zelle">Zelle</option>
                        <option value="Transferencia">Transferencia</option>
                    </select>
                </div>

            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="add()" class="btn bg-olive">Gruardar</button>
            </div>
        </div>
    </div>
</div>
