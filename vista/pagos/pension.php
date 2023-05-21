<!-- Formulario (Pago) -->
<form id="frmpagopension" method="post" onsubmit="return pagopension()">
    <div class="modal fade" id="pension" tabindex="-1" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tomar Pension</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Alumno</legend>
                        <div class="row">
                            <input type="text" id="matriculaid" name="matriculaid" hidden>
                            <input type="text" id="alumnoid" name="alumnoid" hidden>
                            <input type="text" id="gradoid" name="gradoid" hidden>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Nombre Estudiante</label>
                                    <input type="text" id="alunomu" name="alunomu" class="form-control input-sm" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label">Grado</label>
                                    <input type="text" id="nomgrau" name="nomgrau" class="form-control input-sm" disabled>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Matricula</legend>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                <label class="form-label">Fecha Operacion</label>
                                    <input type="date" id="fecpenu" name="fecpenu" class="form-control input-sm" placeholder="Fecha Nacimiento">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Valor Matricula</label>
                                    <input type="text" id="pensionu" name="pensionu" class="form-control input-sm" readonly>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Saldo Anterior</label>
                                    <input type="text" id="restau" name="restau" class="form-control input-sm" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Valor Despues Abono</label>
                                    <input type="text" id="diferenciau" name="diferenciau" class="form-control input-sm" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Valor Abono</label>
                                    <input type="text" id="avanceu" name="avanceu" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                <label class="form-label">Tipo Pago</label>
                                    <select id="idtipagou" name="idtipagou" class="form-control input-sm">
                                        <option selected >TIPO PAGO</option>
                                        <option value="3">ABONO PENSION</option>
                                        <option value="4">PAGO TOTAL PENSION</option>
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
    let resta = document.getElementById("restau")
    let diferencia = document.getElementById("diferenciau")
    let avance = document.getElementById("avanceu")
    avance.addEventListener("change", () => {
        diferencia.value = parseFloat(resta.value) - parseFloat(avance.value)
    })
</script>

