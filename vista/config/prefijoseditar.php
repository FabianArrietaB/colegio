<!-- Formulario (Agregar) -->
<form id="frmeditarprefijo" method="post" onsubmit="return editarparafiscal()">
    <div class="modal fade" id="prefijoeditar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Prefijo</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Estudiante) -->
                    <fieldset class="group-border">
                        <input type="text" id="idprefijo" name="idprefijo" hidden>
                        <br>
                        <div class="col">
                            <div class="input-group input-group">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Tipo Movimiento</span>
                                <input hidden type="text" id="idpretipmov" name="idpretipmov" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <input type="text" id="pretipmovu" name="pretipmovu" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tipmovimientos"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                        <br>
                        <div class="col">
                        <div class="input-group">
                                <span class="input-group-text">Prefijo</span>
                                <input type="text" id="prefiju" name="prefiju" aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col">
                        <div class="input-group">
                                <span class="input-group-text">Detalle</span>
                                <input type="text" id="prenombreu" name="prenombreu"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <div class="input-group">
                            <div class="input-group">
                                <span class="input-group-text">Consecutivo</span>
                                <input type="text" id="preconsecu" name="preconsecu"  aria-label="First name" class="form-control">
                            </div>
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">Numeracion Inicial</span>
                                <input type="text" id="prenuminiu" name="prenuminiu"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">Numeracion Final</span>
                                <input type="text" id="prenumfinu" name="prenumfinu"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col">
                        <div class="input-group">
                                <span class="input-group-text">Fecha Inicial</span>
                                <input type="date" id="prefeciniu" name="prefeciniu"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col">
                        <div class="input-group">
                                <span class="input-group-text">Fecha Final</span>
                                <input type="date" id="prefecfinu" name="prefecfinu"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col">
                        <div class="input-group">
                                <span class="input-group-text">Resolucion</span>
                                <input type="text" id="preresoluu" name="preresoluu"  aria-label="First name" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col mb-2">
                            <div class="input-group">
                                <span class="input-group-text">Estado</span>
                                <select name="estado" id="estado" class="form-control input-sm">
                                    <option value="1">ACTIVO</option>
                                    <option value="0">INACTIVO</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="col">
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success" data-bs-dismiss="modal">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->