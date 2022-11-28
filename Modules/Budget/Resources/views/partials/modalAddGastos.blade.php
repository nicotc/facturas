<div wire:ignore.self class="modal fade" id="modalAddGastos" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-lightblue">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Gastos</h5>
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
                    <input type="proveedor" wire:model="proveedor" class="form-control" name="proveedor" id="proveedor" placeholder="proveedor">
                    @error('proveedor') <span class="error text-danger">{{ $message }}</span> @enderror
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
                    <label for="abono">Abono</label>
                    <input type="text" wire:model="abono" class="form-control" name="abono" id="abono" placeholder="abono">
                    @error('abono') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" wire:model="estado" class="form-control" name="estado" id="estado" placeholder="estado">
                    @error('estado') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="nota">Nota</label>
                    <textarea wire:model="nota" class="form-control" name="nota" id="nota"
                        placeholder="nota"></textarea>
                    @error('nota') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>


            <div class="modal-footer">

                <button type="button" wire:click.prevent="add()" class="btn bg-lightblue">Guardar</button>
            </div>
        </div>
    </div>
</div>
