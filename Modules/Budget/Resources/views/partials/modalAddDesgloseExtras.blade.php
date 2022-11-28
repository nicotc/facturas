<div wire:ignore.self class="modal fade" id="modalAddDesgloseExtras" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-lightblue">
                <h5 class="modal-title" id="exampleModalLabel">Desglose: Nuevo Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" wire:model="cantidad" class="form-control" name="cantidad" id="cantidad"
                            placeholder="Cantidad">
                        @error('cantidad') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" wire:model="descripcion" class="form-control" name="descripcion" id="descripcion"
                        placeholder="Descripcion">
                    @error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Precio Base</label>
                    <input type="text" wire:model="precioBase" class="form-control" name="precioBase" id="precioBase"
                        placeholder="Precio Base">
                    @error('precioBase') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                        <label for="precioTotal">Precio Base Total</label>
                        <label for="precioTotal">{{ $precioTotal }}</label>
                </div>
 
        </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="add()" class="btn bg-lightblue">Guardar</button>
            </div>
        </div>
    </div>
</div>
