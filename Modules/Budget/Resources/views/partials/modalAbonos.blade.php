<div wire:ignore.self  class="modal fade" id="abonos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-olive">
                <h5 class="modal-title" id="exampleModalLabel">Abonos del Presupuesto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
<h3>Abonado: 60 / Total a pagar: 100</h3>


                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 60%" aria-valuenow="60"
                        aria-valuemin="0" aria-valuemax="100">60%</div>
                </div>


                <table class="table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Abono</th>
                            <th>Saldo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2021-01-01</td>
                            <td>1000</td>
                            <td>1000</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">

                <button type="button" wire:click.prevent="add()" class="btn bg-olive">Gruardar</button>
            </div>
        </div>
    </div>




</div>
