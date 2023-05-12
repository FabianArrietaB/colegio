<!-- Formulario (Agregar) -->
<form id="frmagregaralumno" method="post" onsubmit="return agregaralumno()">
    <div class="modal fade" id="create" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Alumno</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Alumno) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Alumno</legend>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombre" name="nombre" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="cladoc" id="cladoc" class="form-control input-sm">
                                        <option selected >TIPO DOCUMENTO</option>
                                        <option value="TARJETA IDENTIDAD">TARJETA IDENTIDAD</option>
                                        <option value="CEDULA">CEDULA</option>
                                        <option value="CEDULA EXTRANEJERIA">CEDULA EXTRANEJERIA</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="docume" name="docume" class="form-control input-sm" placeholder="Ingrese Documento">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="date" id="fecnac" name="fecnac" class="form-control input-sm" placeholder="Fecha Nacimiento">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="sexo" id="sexo" class="form-control input-sm">
                                        <option selected >SEXO</option>
                                        <option value="MASCULINO">MASCULINO</option>
                                        <option value="FEMENINO">FEMENINO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="gposan" id="gposan" class="form-control input-sm">
                                        <option selected >TIPO SANGRE</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="factrh" id="factrh" class="form-control input-sm">
                                        <option selected >FACTOR RH</option>
                                        <option value="POSITIVO">POSITIVO</option>
                                        <option value="NEGATIVO">NEGATIVO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="telcel" name="telcel" class="form-control input-sm" placeholder="Ingrese Telefono">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="ciudad" name="ciudad" class="form-control input-sm" placeholder="Ingrese Ciudad">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <input type="text" id="direcc" name="direcc" class="form-control input-sm" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="col-2">
                            <div class="input-group mb-3">
                                    <select name="estrat" id="estrat" class="form-control input-sm">
                                        <option selected >ESTRATO</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="MAS">MAS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <input type="text" id="correo" name="correo" class="form-control input-sm" placeholder="Ingrese Correo" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Formulario (Madre) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Madre</legend>
                        <div class="row">
                            <input type="text" id="parmad" name="parmad" value="MADRE" hidden>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="nommad" name="nommad" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="cldoma" id="cldoma" class="form-control input-sm">
                                        <option selected >TIPO DOCUMENTO</option>
                                        <option value="CEDULA">CEDULA</option>
                                        <option value="CEDULA EXTRANEJERIA">CEDULA EXTRANGERIA</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="docmad" name="docmad" class="form-control input-sm" placeholder="Ingrese Documento">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="telmad" name="telmad" class="form-control input-sm" placeholder="Ingrese Telefono">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="ciumad" name="ciumad" class="form-control input-sm" placeholder="Ingrese Ciudad">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="dirmad" name="dirmad" class="form-control input-sm" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="col-2">
                            <div class="input-group mb-3">
                                    <select name="estmad" id="estmad" class="form-control input-sm">
                                        <option selected >ESTRATO</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="MAS">MAS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="cormad" name="cormad" class="form-control input-sm" placeholder="Ingrese Correo" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Formulario (Padre) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Padre</legend>
                        <div class="row">
                            <input type="text" id="parpad" name="parpad" value="PADRE" hidden>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="nompad" name="nompad" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="cldopa" id="cldopa" class="form-control input-sm">
                                        <option selected >TIPO DOCUMENTO</option>
                                        <option value="CEDULA">CEDULA</option>
                                        <option value="CEDULA EXTRANEJERIA">CEDULA EXTRANGERIA</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="docpad" name="docpad" class="form-control input-sm" placeholder="Ingrese Documento">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="telpad" name="telpad" class="form-control input-sm" placeholder="Ingrese Telefono">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="ciupad" name="ciupad" class="form-control input-sm" placeholder="Ingrese Ciudad">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="dirpad" name="dirpad" class="form-control input-sm" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="col-2">
                            <div class="input-group mb-3">
                                    <select name="estpad" id="estpad" class="form-control input-sm">
                                        <option selected >ESTRATO</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="MAS">MAS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="corpad" name="corpad" class="form-control input-sm" placeholder="Ingrese Correo" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Formulario (Grado) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Grado</legend>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                <select name="idgrado" id="idgrado" class="form-control input-sm">
                                        <option selected >GRADO</option>
                                        <option value="1">TRANSICION</option>
                                        <option value="2">PRIMERO</option>
                                        <option value="3">SEGUNDO</option>
                                        <option value="4">TERCERO</option>
                                        <option value="5">CUARTO</option>
                                        <option value="6">QUINTO</option>
                                        <option value="7">SEXTO</option>
                                        <option value="8">SEPTIMO</option>
                                        <option value="9">OCTAVO</option>
                                        <option value="10">NOVENO</option>
                                        <option value="11">DECIMO</option>
                                        <option value="12">UNDECIMO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="matric" name="matric" class="form-control input-sm" placeholder="Matricula">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="pensio" name="pensio" class="form-control input-sm" placeholder="Ingrese Pension">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="abono" name="abono" class="form-control input-sm" placeholder="Abono Matricula">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <input type="text" id="detall" name="detall" class="form-control input-sm" placeholder="Abono Matricula">
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
<!-- Fin Formulario (Agregar) -->
