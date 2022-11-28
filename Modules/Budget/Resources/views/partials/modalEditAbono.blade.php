<div wire:ignore.self class="modal fade" id="modalEditAbono" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-lightblue">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Abono</h5>
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
                    <label for="precioTotal">Concepto:</label>
                    <label for="precioTotal">Abono de pago a orden de compra {{$codigoProyecto}}</label>
                </div>

                <div class="form-group">
                    <label for="material">Descripcion</label>
                    <textarea wire:model="descripcion" class="form-control" name="descripcion" id="descripcion" placeholder="descripcion"></textarea>

                    @error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="abonado">Monto Abonado</label>
                    <input type="text" wire:model="abonado" class="form-control" name="abonado" id="abonado" placeholder="abonado">
                    @error('abonado') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="formaPago">Forma de Pago</label>
                    <select wire:model="formaPago" class="form-control" name="formaPago" id="formaPago">
                        <option value="">selecciona</option>
                        <option value="Zelle" >Zelle</option>
                        <option value="Trasferencia">Trasferencia</option>
                        <option value="Efectivo">Efectivo</option>
                    </select>

                    @error('formaPago') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                        <label for="numeroReferencia">Numero de Referencia</label>
                        <input type="text" wire:model="numeroReferencia" class="form-control" name="numeroReferencia" id="numeroReferencia" placeholder="numeroReferencia">
                        @error('numeroReferencia') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>


            <div class="modal-footer">

                <button type="button" wire:click.prevent="edit()" class="btn bg-lightblue">Guardar</button>
            </div>
        </div>
    </div>
</div>
