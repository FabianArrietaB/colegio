<!-- Formulario (Agregar) -->
<form id="frmagregarempleado" method="post" onsubmit="return agregarempleado()">
    <div class="modal fade" id="create" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Empleado</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario (Empleado) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Empleado</legend>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombre" name="nombre" class="form-control input-sm" placeholder="Ingrese Nombre" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="cladoc" id="cladoc" class="form-control input-sm">
                                        <option selected >Selecione Tipo Documento Grupo</option>
                                        <option value="CEDULA">Cedula</option>
                                        <option value="CEDULA EXTRANEJERIA">Cedula Extrangeria</option>
                                        <option value="PASAPORTE">Pasaporte</option>
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
                                        <option selected >Sexo</option>
                                        <option value="MASCULINO">Masculino</option>
                                        <option value="FEMENINO">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="gposan" id="gposan" class="form-control input-sm">
                                        <option selected >Tipo Sangre</option>
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
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="estciv" id="estciv" class="form-control input-sm">
                                        <option selected >ESTADO CIVIL</option>
                                        <option value="SOLTERO/A">SOLTERO/A</option>
                                        <option value="CASADO/A">CASADO/A</option>
                                        <option value="UNION LIBRE">UNION LIBRE</option>
                                        <option value="DIVORCIADO/A">DIVORCIADO/A</option>
                                        <option value="VIUDO/A">VIUDO/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="escola" id="escola" class="form-control input-sm">
                                        <option selected >NIVEL ESCOLA</option>
                                        <option value="NINGUNO">NINGUNO</option>
                                        <option value="PRIMARIA">PRIMARIA/</option>
                                        <option value="BACHILLER">BACHILLER</option>
                                        <option value="TECNICO">TECNICO</option>
                                        <option value="TECNOLOGO">TECNOLOGO</option>
                                        <option value="PROFESIONAL">PROFESIONAL</option>
                                        <option value="ESPECIALIZACION">ESPECIALIZACION</option>
                                        <option value="MAESTRIA">MAESTRIA</option>
                                        <option value="DOCTORADDO">DOCTORADDO</option>
                                        <option value="POST-DOCTORADDO">POST-DOCTORADO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <select name="hijos" id="hijos" class="form-control input-sm">
                                        <option selected >HIJOS</option>
                                        <option value="0">0</option>
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
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="telcel" name="telcel" class="form-control input-sm" placeholder="Ingrese Telefono">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="ciudad" name="ciudad" class="form-control input-sm" placeholder="Ingrese Ciudad">
                                </div>
                            </div>
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
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="correo" name="correo" class="form-control input-sm" placeholder="Ingrese Correo" >
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="cargo" name="cargo" class="form-control input-sm" placeholder="Ingrese Cargo">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="tipcon" id="tipcon" class="form-control input-sm">
                                        <option selected >Selecione Tipo Contrato</option>
                                        <option value="OBRA LABOR">OBRA LABOR</option>
                                        <option value="FIJO">FIJO</option>
                                        <option value="INDEFINIDO">INDEFINIDO</option>
                                        <option value="APRENDIZAJE">APRENDIZAJE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="salari" name="salari" class="form-control input-sm" placeholder="Ingrese Salario">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="codeps" id="codeps" class="form-control input-sm">
                                        <option selected >Selecione EPS</option>
                                        <?php
                                            $sql="SELECT p.id_parafiscal as idparafiscal, p.par_nombre as nombre FROM parafiscales as p";
                                            $respuesta = mysqli_query($conexion, $sql);
                                            while($parafiscales = mysqli_fetch_array($respuesta)) {
                                        ?>
                                            <option value="<?php echo $parafiscales['idparafiscal']?>"><?php echo $parafiscales['nombre'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="codarl" id="codarl" class="form-control input-sm">
                                        <option selected >Selecione ARL</option>
                                        <?php
                                            $sql="SELECT p.id_parafiscal as idparafiscal, p.par_nombre as nombre FROM parafiscales as p";
                                            $respuesta = mysqli_query($conexion, $sql);
                                            while($parafiscales = mysqli_fetch_array($respuesta)) {
                                            ?>
                                            <option value="<?php echo $parafiscales['idparafiscal']?>"><?php echo $parafiscales['nombre'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="codpen" id="codpen" class="form-control input-sm">
                                        <option selected >Selecione Pension</option>
                                        <?php
                                            $sql="SELECT p.id_parafiscal as idparafiscal, p.par_nombre as nombre FROM parafiscales as p";
                                            $respuesta = mysqli_query($conexion, $sql);
                                            while($parafiscales = mysqli_fetch_array($respuesta)) {
                                            ?>
                                            <option value="<?php echo $parafiscales['idparafiscal']?>"><?php echo $parafiscales['nombre'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="codces" id="codces" class="form-control input-sm">
                                        <option selected >Selecione Censantia</option>
                                        <?php
                                            $sql="SELECT p.id_parafiscal as idparafiscal, p.par_nombre as nombre FROM parafiscales as p";
                                            $respuesta = mysqli_query($conexion, $sql);
                                            while($parafiscales = mysqli_fetch_array($respuesta)) {
                                            ?>
                                            <option value="<?php echo $parafiscales['idparafiscal']?>"><?php echo $parafiscales['nombre'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <!-- Formulario (Usuario) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Usuario</legend>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input placeholder="Ingrese Usuario" type="text" id="usuario" name="usuario" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input placeholder="Ingrese Contraseña" type="text" id="password" name="password" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <select name="idRol" id="idRol" class="form-control input-sm">
                                        <option selected >Selecione un Rol</option>
                                        <option value="1">Alumno</option>
                                        <option value="2">Docente</option>
                                        <option value="3">Supervisor</option>
                                        <option value="4">Administrador</option>
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
<!-- Fin Formulario (Agregar) -->
