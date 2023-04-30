<!-- Formulario (Agregar) -->
<form id="frmeditaralumno" method="post" onsubmit="return editaralumno()">
    <div class="modal fade" id="editar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Alumno</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Alumno) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Alumno</legend>
                        <div class="row">
                        <input type="text" id="idalumno" name="idalumno" hidden>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombreu" name="nombreu" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="cladocu" id="cladocu" class="form-control input-sm">
                                        <option value="TARJETA IDENTIDAD">TARJETA IDENTIDAD</option>
                                        <option value="CEDULA">CEDULA</option>
                                        <option value="CEDULA EXTRANEJERIA">CEDULA EXTRANEJERIA</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="documeu" name="documeu" class="form-control input-sm" placeholder="Ingrese Documento">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="date" id="fecnacu" name="fecnacu" class="form-control input-sm" placeholder="Fecha Nacimiento">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="sexou" id="sexou" class="form-control input-sm">
                                        <option value="MASCULINO">MASCULINO</option>
                                        <option value="FEMENINO">FEMENINO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="gposanu" id="gposanu" class="form-control input-sm">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="factrhu" id="factrhu" class="form-control input-sm">
                                        <option value="POSITIVO">POSITIVO</option>
                                        <option value="NEGATIVO">NEGATIVO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="telcelu" name="telcelu" class="form-control input-sm" placeholder="Ingrese Telefono">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="ciudadu" name="ciudadu" class="form-control input-sm" placeholder="Ingrese Ciudad">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <input type="text" id="direccu" name="direccu" class="form-control input-sm" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="col-2">
                            <div class="input-group mb-3">
                                    <select name="estratu" id="estratu" class="form-control input-sm">
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
                                    <input type="text" id="correou" name="correou" class="form-control input-sm" placeholder="Ingrese Correo" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Formulario (Madre) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Madre</legend>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="nommadu" name="nommadu" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="cldomau" id="cldomau" class="form-control input-sm">
                                        <option value="CEDULA">CEDULA</option>
                                        <option value="CEDULA EXTRANEJERIA">CEDULA EXTRANGERIA</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="docmadu" name="docmadu" class="form-control input-sm" placeholder="Ingrese Documento">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="telmadu" name="telmadu" class="form-control input-sm" placeholder="Ingrese Telefono">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="ciumadu" name="ciumadu" class="form-control input-sm" placeholder="Ingrese Ciudad">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="dirmadu" name="dirmadu" class="form-control input-sm" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="col-2">
                            <div class="input-group mb-3">
                                    <select name="estmadu" id="estmadu" class="form-control input-sm">
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
                                    <input type="text" id="cormadu" name="cormadu" class="form-control input-sm" placeholder="Ingrese Correo" >
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Formulario (Padre) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Padre</legend>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="nompadu" name="nompadu" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="cldopau" id="cldopau" class="form-control input-sm">
                                        <option value="CEDULA">CEDULA</option>
                                        <option value="CEDULA EXTRANEJERIA">CEDULA EXTRANGERIA</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="docpadu" name="docpadu" class="form-control input-sm" placeholder="Ingrese Documento">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="telpadu" name="telpadu" class="form-control input-sm" placeholder="Ingrese Telefono">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="ciupadu" name="ciupadu" class="form-control input-sm" placeholder="Ingrese Ciudad">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="dirpadu" name="dirpadu" class="form-control input-sm" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="col-2">
                            <div class="input-group mb-3">
                                    <select name="estpadu" id="estpadu" class="form-control input-sm">
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
                                    <input type="text" id="corpadu" name="corpadu" class="form-control input-sm" placeholder="Ingrese Correo" >
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
                                <select name="idgradou" id="idgradou" class="form-control input-sm">
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
                        </div>
                    </fieldset>
                    <div class="card-footer text-center">
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar) -->
