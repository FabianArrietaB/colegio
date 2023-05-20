<!-- Formulario (Agregar) -->
<form id="frmeditarempleado" method="post">
    <div class="modal fade" id="editar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalle Ventas Alumno</h5>
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <d class="modal-body">
                    <!-- Formulario (Empleado) -->
                    <fieldset class="group-border">
                        <legend class="group-border">Informacion Alumno</legend>
                        <div class="row">
                            <input type="text" id="idalumno" name="idalumno" hidden>
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="nombreu" name="nombreu" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select id="cladocu" name="cladocu" class="form-control input-sm">
                                        <option value="CEDULA">Cedula</option>
                                        <option value="CEDULA EXTRANEJERIA">Cedula Extrangeria</option>
                                        <option value="PASAPORTE">Pasaporte</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="documeu" name="documeu" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="date" id="fecnacu" name="fecnacu" class="form-control input-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="sexou" id="sexou" class="form-control input-sm">
                                        <option value="MASCULINO">Masulino</option>
                                        <option value="FEMENINO">Femenino</option>
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
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="estcivu" id="estcivu" class="form-control input-sm">
                                        <option value="SOLTERO/A">SOLTERO/A</option>
                                        <option value="CASADO/A">CASADO/</option>
                                        <option value="UNION LIBRE">UNION LIBRE</option>
                                        <option value="DIVORCIADO/A">DIVORCIADO/A</option>
                                        <option value="VIUDO/A">VIUDO/A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <select name="escolau" id="escolau" class="form-control input-sm">
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
                                    <select name="hijosu" id="hijosu" class="form-control input-sm">
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
                                    <input type="text" id="telcelu" name="telcelu" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="ciudadu" name="ciudadu" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group mb-3">
                                    <input type="text" id="direccu" name="direccu" class="form-control input-sm">
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
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="input-group mb-3">
                                    <input type="text" id="correou" name="correou" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <input type="text" id="cargou" name="cargou" class="form-control input-sm">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="tipconu" id="tipconu" class="form-control input-sm">
                                        <option value="OBRA LABOR">OBRA LABOR</option>
                                        <option value="FIJO">FIJO</option>
                                        <option value="INDEFINIDO">INDEFINIDO</option>
                                        <option value="APRENDIZAJE">APRENDIZAJE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group mb-3">
                                    <input type="text" id="salariu" name="salariu" class="form-control input-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="input-group mb-3">
                                    <select name="codepsu" id="codepsu" class="form-control input-sm">
                                        <?php
                                            $sql="SELECT p.id_parafiscales as idparafiscal, p.par_nombre as nombre FROM parafiscales as p";
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
                                    <select name="codarlu" id="codarlu" class="form-control input-sm">
                                        <?php
                                            $sql="SELECT p.id_parafiscales as idparafiscal, p.par_nombre as nombre FROM parafiscales as p";
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
                                    <select name="codpenu" id="codpenu" class="form-control input-sm">
                                        <?php
                                            $sql="SELECT p.id_parafiscales as idparafiscal, p.par_nombre as nombre FROM parafiscales as p";
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
                                    <select name="codcesu" id="codcesu" class="form-control input-sm">
                                        <?php
                                            $sql="SELECT p.id_parafiscales as idparafiscal, p.par_nombre as nombre FROM parafiscales as p";
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
                    <div class="card-footer text-center">
                        <button class="btn btn-success" data-bs-dismiss="modal">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Fin Formulario (Agregar) -->
