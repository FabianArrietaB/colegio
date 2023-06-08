<?php
	/* Connect To Database*/
    include "header.php";
    include "sidebar.php";
	require_once ("../modelo/conexion.php");//Contiene funcion que conecta a la base de datos
    $con = new Conexion();
    $conexion = $con->conectar();
	//Consulta Empresa
	$sql_empresa = "select * from sedes where id_sedes = 1 limit 0,1";//Obtengo los datos del Empresa
	$query2 = mysqli_query($conexion, $sql_empresa);
	$rw_empresa = mysqli_fetch_array($query2);
	$sql = "select LAST_INSERT_ID(id_facturas) as last from facturas";
	$query1 = mysqli_query($conexion, $sql);
	$rw1 = mysqli_fetch_array($query1);
	$numero = $rw1['last']+1;
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
                    <hr />
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h2>Detalles del cliente :</h2>
                            <select class="form-select input-sm" name="idpersona" id="idpersona" required>
                                <option value="">Seleccionar Persona</option>
                            </select>
                            <input type="text" id="nomacu" name="nomacu" class="form-control input-sm">
                            <input type="text" id="nomalu" name="nomalu" class="form-control input-sm">
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
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
                        <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
				    <div class="modal-body">
                        <fieldset class="group-border">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Descripción del producto/servicio</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion"  required></textarea>
                                    <input type="hidden" class="form-control" id="action" name="action"  value="ajax">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Cantidad</label>
                                    <input type="text" class="form-control" id="cantidad" name="cantidad" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Precio unitario</label>
                                    <input type="text" class="form-control" id="precio" name="precio" required>
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
