<div wire:ignore.self class="modal fade" id="modalEditDesgloseItem" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-indigo">
                <h5 class="modal-title" id="exampleModalLabel">Desglose: Editar Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
         <div class="form-group">
                <label for="descripcion">Descripción</label>
              
                    <textarea type="text" wire:model="descripcion" class="form-control" id="descripcion"
                            placeholder="Ingrese la descripción del item" rows="6"></textarea>
                @error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
<div class="form-group">
            <label for="area">Area</label>
            <input type="text" wire:model="area" class="form-control" name="area" id="area"
                placeholder="Area">
            @error('area') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" wire:model="cantidad" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad">
            @error('cantidad') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="edit()" class="btn bg-indigo">Guardar</button>
            </div>
        </div>
    </div>
</div>
