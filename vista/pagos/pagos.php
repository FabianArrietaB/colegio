<!-- Formulario (Pago) -->
<form id="frmpagomatricula" method="post" onsubmit="return pagomatricula()">
    <div class="modal fade" id="pago" tabindex="-1" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tomar pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Alumno</legend>
                        <div class="row">
                            <input type="text" id="idmatricula" name="idmatricula" hidden>
                            <input type="text" id="idalumno" name="idalumno" hidden>
                            <input type="text" id="idgrado" name="idgrado" hidden>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Nombre Estudiante</label>
                                    <input type="text" id="nomaluu" name="nomaluu" class="form-control input-sm" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Grado</label>
                                    <input type="text" id="gradou" name="gradou" class="form-control input-sm" disabled>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Matricula</legend>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Valor Matricula</label>
                                    <input type="text" id="matriculau" name="matriculau" class="form-control input-sm" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Saldo Anterior</label>
                                    <input type="text" id="saldou" name="saldou" class="form-control input-sm" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Valor Despues Abono</label>
                                    <input type="text" id="balanceu" name="balanceu" class="form-control input-sm" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Valor Abono</label>
                                    <input type="text" id="abonou" name="abonou" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <select id="idtippagou" name="idtippagou" class="form-control input-sm">
                                        <option selected >TIPO PAGO</option>
                                        <option value="1">ABONO MATRICULA</option>
                                        <option value="2">PAGO TOTAL MATRICULA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="card-footer text-center">
                        <button class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar, Modificar) -->
<!-- Calcular Valor Balance -->
<script>
    let saldo = document.getElementById("saldou")
    let balance = document.getElementById("balanceu")
    let abono = document.getElementById("abonou")
    abono.addEventListener("change", () => {
        balance.value = parseFloat(saldo.value) - parseFloat(abono.value)
    })
</script>

