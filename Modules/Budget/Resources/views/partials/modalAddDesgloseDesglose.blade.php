<div wire:ignore.self class="modal fade" id="modalAddDesgloseDesglose" tabindex="-1" role="dialog"
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
                             min="1" >
                        @error('cantidad') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                        <label for="material">Material</label>
                        <input type="text" wire:model="material" class="form-control" name="material" id="material"
                            placeholder="Material">
                        @error('material') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>

                      <textarea type="text" wire:model="descripcion" class="form-control" id="descripcion"
                        placeholder="Ingrese la descripción del item" rows="6"></textarea>
                    @error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror


                </div>
                <div class="form-group">
                    <label for="descripcion">Precio Base</label>
                    <input type="number" wire:model="precioBase" class="form-control" name="precioBase" id="precioBase"
                       min="1">
                    @error('precioBase') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                        <label for="precioTotal">Precio Base Total</label>
                        <label for="precioTotal">{{ $precioTotal }}</label>
                </div>
                <div class="form-group">
                    <label for="precioBaseProyectado">Precio Base Proyectado</label>
                    <input type="number" wire:model="precioBaseProyectado" class="form-control" name="precioBaseProyectado" id="precioBaseProyectado"
                       min="1">
                    @error('precioBaseProyectado') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                        <label for="precioTotal">Precio Total Proyectado</label>
                        <label for="precioTotal">{{ $precioTotalProyectado }}</label>
                </div>
        </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="add()" class="btn bg-lightblue">Guardar</button>
            </div>
        </div>
    </div>
</div>
