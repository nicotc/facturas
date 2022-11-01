<div wire:ignore.self class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estas seguro de eliminar el producto? <b> {{$name}} </b></p>

            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="delete()" class="btn btn-primary close-modal"
                    data-dismiss="modal">Eliminar</button>
            </div>
        </div>
    </div>
</div>
