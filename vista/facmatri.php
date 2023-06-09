<?php
	/* Connect To Database*/
    include "header.php";
    include "sidebar.php";
	require_once ("../modelo/conexion.php");//Contiene funcion que conecta a la base de datos
    $con = new Conexion();
    $conexion = $con->conectar();
	//Consulta Empresa
	$sql_empresa = "select * from sedes where id_sedes = 1 limit 0,1";//Obtengo los datos del Empresa
	$query1 = mysqli_query($conexion, $sql_empresa);
	$rw_empresa = mysqli_fetch_array($query1);
	$sql = "select max(id_facturas) as last from facturas";
	$query2 = mysqli_query($conexion, $sql);
	$rw_facrura = mysqli_fetch_array($query2);
	$numero = $rw_facrura['last']+1;
?>
    <div class="container outer-section" >
        <form class="form-horizontal" role="form" id="datos_factura" method="post">
            <div id="print-area">
                <div class="row pad-top font-big">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <a href="https://obedalvarado.pw/" target="_blank">
                            <img src="../public/images/logo.png" width="25%" height="25%" alt="Logo sistemas web"/>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <strong>E-mail : </strong> <?php echo $rw_empresa['sed_correo'];?>
                        <br />
                        <strong>Teléfono :</strong> <?php echo $rw_empresa['sed_telcel'];?> <br />
                        <!-- <strong>Sitio web :</strong> <?php echo $rw_empresa['web'];?>  -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <strong><?php echo $rw_empresa['sed_razsoc'];?>  </strong>
                        <br />
                        Dirección : <?php echo $rw_empresa['sed_direcc'];?> 
                    </div>
                </div>
                <div class="row ">
                    <hr/>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h2>Detalles del cliente :</h2>
                        <div class="input-group mb-1">
                            <select class="form-select input-sm" name="idpersona" id="idpersona" required>
                                <option value="">Seleccionar Acudiente</option>
                            </select>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Alumno</span>
                            </div>
                            <input class="form-control" placeholder="Nombre Alumno" type="text" id="nomalu" name="nomalu" aria-label="Recipient's text" aria-describedby="my-addon">
                            <input hidden class="form-control" placeholder="Nombre Acudiente" type="text" id="nomacu" name="nomacu" aria-label="Recipient's text" aria-describedby="my-addon">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Direccion</span>
                            </div>
                            <input class="form-control" placeholder="Direccion Alumno" type="text" id="direcc" name="direcc" aria-label="Recipient's text" aria-describedby="my-addon">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h2>Detalles del ticket:</h2>
                        <h4><strong>Ticket #: </strong><?php echo $numero;?></h4>
                        <h4><strong>Fecha: </strong> <?php echo date("d/m/Y");?></h4>
                    </div>
                </div>
                <div class="row">
                <hr />
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-striped  table-hover">
                                <thead>
                                    <tr >
                                        <th class='text-center'>Item</th>
                                        <th>Descripción</th>
                                        <th class='text-center'>Cantidad</th>
                                        <th class='text-right'>Precio unitario</th>
                                        <th class='text-right'>Total</th>
                                        <th class='text-right'></th>
                                    </tr>
                                </thead>
                                <tbody class='items'>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <hr/>
            </div>
            <div class="row pad-bottom  pull-right">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success btn-lg ">Guardar Ticket</button>
                </div>
            </div>
        </form>
    </div>
	<form class="form-horizontal" name="guardar_item" id="guardar_item">
        <div class="modal fade" id="producto" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="group-border">
                            <legend class="group-border"></legend>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <select name="idproducto" id="idproducto" class="form-control input-sm">
                                            <option selected >Selecione Producto</option>
                                            <?php
                                            $sql="SELECT p.id_producto as idproducto, p.pro_nombre as producto FROM productos as p WHERE p.pro_estado = 1";
                                            $respuesta = mysqli_query($conexion, $sql);
                                            while($producto = mysqli_fetch_array($respuesta)) {
                                                ?>
                                            <option value="<?php echo $producto['idproducto']?>"><?php echo $producto['producto'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Cantidad</label>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Precio</label>
                                    <input type="text" id="precio" name="precio" class="form-control input-sm" readonly>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Tipo Pago</label>
                                        <select id="idtippagou" name="idtippagou" class="form-control input-sm">
                                            <option selected >TIPO PAGO</option>
                                            <option value="0">VENTA</option>
                                            <option value="1">ABONO MATRICULA</option>
                                            <option value="2">PAGO TOTAL MATRICULA</option>
                                            <option value="3">ABONO PENSION</option>
                                            <option value="4">PAGO TOTAL PENSION</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Observacion</label>
                                    <input type="text" id="detalle" name="detalle" class="form-control input-sm" readonly>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info" data-bs-dismiss="modal">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
	</form>
<?php
require('footer.php');
?>
<script src="../public/js/factura/factura.js"></script>
