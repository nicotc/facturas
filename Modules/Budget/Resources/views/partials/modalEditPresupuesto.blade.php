<div wire:ignore.self class="modal fade" id="modalEditPresupuesto" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-lightblue">
                <h5 class="modal-title" id="exampleModalLabel">Presupuesto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="precioTotal">Costo Unitario de este item</label>
                    <label for="precioTotal">{{ $desgloseunitario }}</label>
                </div>
                <div class="form-group">
                    <label for="precioTotal">Costo Total de este item</label>
                    <label for="precioTotal">{{ $desglosetotal }}</label>
                </div>


                <div class="form-group">
                    <label for="cantidad">Modelo</label>
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" width="100" >
                         @endif
                    <input type="file" wire:model="photo">
                    @error('photo') <span class="error">{{ $message }}</span> @enderror
                </div>

              <div class="form-group">
                        <label for="precioUnitario">Precio Unitario</label>
                        <input type="number" wire:model="precioUnitario" class="form-control" name="precioUnitario" id="precioUnitario"
                            placeholder="precioUnitario">
                        @error('precioUnitario') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>


                <div class="form-group">
                        <label for="precioTotal">Precio Total</label>
                        <label for="precioTotal">{{ $precioTotal }}</label>
                </div>

        </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="edit()" class="btn bg-lightblue">Guardar</button>
            </div>
        </div>
    </div>
</div>
