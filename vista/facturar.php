<?php
    include "header.php";
    include "sidebar.php";
?>
<section class="home-section">
    <div class="container-fluid">
        <div class="page-content">
            <fieldset class="group-border">
                <div class="card-header text-center">
                    <div href="dashboard.php" class="title">
                        <h2>GENERAR FACTURA</h2>
                    </div>
                </div>
            </div>
            <form id="frmcrearfactura" method="post" onsubmit="return crearfactura()">
                <div class="row">
                    <div class="col-6">
                        <div class="card border-primary">
                            <div class="title">
                                <h4>INFORMACION CLIENTE</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card border-primary ">
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Tipo Documento</span>
                                        <select type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            <option value="1">FACTURA VENTA</option>
                                            <option value="2">FACTURA ELECTRONICA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Numero Documento</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha Documento</span>
                                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        <div class="card border-primary">
                            <div class="table-responsive justify-content-center">
                                <table class="table table-light text-center">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Item</th>
                                            <th>CODIGO</th>
                                            <th>NOMBRE PRODUCTO</th>
                                            <th>CANTIDAD</th>
                                            <th>PRECIO</th>
                                            <th>PRECIO TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card border-primary">
                            <div class="title">
                                <h4>TOTALES</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Fin Formulario (Agregar, Modificar) -->
<?php
    include "footer.php";
?>
