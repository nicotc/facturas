<div wire:ignore.self class="modal fade" id="modalEditGastosDetalle" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-lightblue">
                <h5 class="modal-title" id="exampleModalLabel">Editar Gastos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" wire:model="fecha" class="form-control" name="fecha" id="fecha">
                        @error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="proveedor">Proveedor / Trabajador :</label>
                         <div class="form-group">

                    <div data-component="{{ $this->id }}"  id="proveedorModalEditarGastos" wire:ignore  ></div>
                    @error('proveedor') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>

                <div class="form-group">
                    <label for="material">Descripcion</label>
                    <textarea wire:model="descripcion" class="form-control" name="descripcion" id="descripcion" placeholder="descripcion"></textarea>
                    @error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="total">Total</label>
                    <input type="text" wire:model="total" class="form-control" name="total" id="total" placeholder="total">
                    @error('total') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="nota">Nota</label>
                    <textarea wire:model="nota" class="form-control" name="nota" id="nota"
                        placeholder="nota"></textarea>
                    @error('nota') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="modal-footer">

                <button type="button" wire:click.prevent="edit()" class="btn bg-lightblue">Guardar</button>
            </div>
        </div>
    </div>
</div>

