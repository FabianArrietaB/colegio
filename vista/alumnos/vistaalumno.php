<div class="container-fluid px-4 pt-3">
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                    href="<?=base_url().'inventario/consulta'?>">
                        <div class="row">
                            <div class="col-3 text-center"><i class="fas fa-people-carry fa-2x"></i></div>
                            <div class="col-9 text-center pt-1"><strong>INVENTARIO</strong></div>
                        </div>
                    </a>
                </div>
            <?php }?>

            <?php if($this->session->userdata('s_precio')) {
                $modules++;
            ?>
                <div class="col-md-4">
                    <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                            href="<?=base_url().'precios/consulta'?>">
                        <div class="row">
                            <div class="col-3 text-center"><i class="fas fa-dollar-sign fa-2x"></i></div>
                            <div class="col-9 text-center pt-1"><strong>LISTADO DE PRECIOS</strong></div>
                        </div>
                    </a>
                </div>
            <?php }?>

            <?php if($this->session->userdata('s_cartera')) {
                $modules++;
            ?>
                <div class="col-md-4">
                    <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                            href="<?=base_url().'cartera/consulta'?>">
                        <div class="row">
                            <div class="col-3 text-center"><i class="fas fa-hand-holding-usd fa-2x"></i></div>
                            <div class="col-9 text-center pt-1"><strong>CARTERA</strong></div>
                        </div>
                    </a>
                </div>
            <?php }?>

            <?php if($this->session->userdata('s_update_precio')) {
                $modules++;
            ?>
                <div class="col-md-4">
                    <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                            href="<?=base_url().'precios/update'?>">
                        <div class="row">
                            <div class="col-3 text-center"><i class="fas fa-chart-line fa-2x"></i></div>
                            <div class="col-9 text-center pt-1"><strong>UPDATE PRECIOS</strong></div>
                        </div>
                    </a>
                </div>
            <?php }?>

            <?php if($this->session->userdata('s_visita_clientes'))  {
                $modules++;
            ?>
                <div class="col-md-4">
                    <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                            href="<?=base_url().'visitas'?>">
                        <div class="row">
                            <div class="col-3 text-center"><i class="fas fa-user-friends fa-2x"></i></div>
                            <div class="col-9 text-center pt-1"><strong>VISITA CLIENTES</strong></div>
                        </div>
                    </a>
                </div>
            <?php }?>

            <?php if($this->session->userdata('s_pedidos_pendientes')) {
                $modules++;
            ?>
                <div class="col-md-4">
                    <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                            href="<?=base_url().'pedidos/pendientes'?>">
                        <div class="row">
                            <div class="col-3 text-center"><i class="fas fa-clipboard-list fa-2x"></i></div>
                            <div class="col-9 text-center pt-1"><strong>PEDIDOS PENDIENTES</strong></div>
                        </div>
                    </a>
                </div>
            <?php }?>

            <?php if($this->session->userdata('s_ordenes_pendientes')) {
                $modules++;
            ?>
                <div class="col-md-4">
                    <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                            href="<?=base_url().'pedidos/ordenes'?>">
                        <div class="row">
                            <div class="col-3 text-center"><i class="fas fa-clipboard-list fa-2x"></i></div>
                            <div class="col-9 text-center pt-1"><strong>ORDENES PENDIENTES</strong></div>
                        </div>
                    </a>
                </div>
            <?php }?>

            <?php if($this->session->userdata('s_compras_pendientes')) {
                $modules++;
            ?>
                <div class="col-md-4">
                    <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                            href="<?=base_url().'compras/pendientes'?>">
                        <div class="row">
                            <div class="col-3 text-center"><i class="fas fa-clipboard-list fa-2x"></i></div>
                            <div class="col-9 text-center pt-1"><strong>COMPRAS PENDIENTES</strong></div>
                        </div>
                    </a>
                </div>
            <?php }?>

            <?php if($this->session->userdata('s_reimpresiones')) {
                $modules++;
            ?>
                <div class="col-md-4">
                    <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                            href="<?=base_url().'reimpresiones'?>">
                        <div class="row">
                            <div class="col-3 text-center"><i class="far fa-copy fa-2x"></i></div>
                            <div class="col-9 text-center pt-1"><strong>REIMPRESIONES</strong></div>
                        </div>
                    </a>
                </div>
            <?php }?>
        
            <?php if($this->session->userdata('s_logistica')) {
                $modules++;
            ?>
                <div class="col-md-4">
                    <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                            href="<?=base_url().'logistica/registrar_documentos'?>">
                        <div class="row">
                            <div class="col-3 text-center"><i class="fa fa-truck-loading fa-2x"></i></div>
                            <div class="col-9 text-center pt-1"><strong>LOGISTICA</strong></div>
                        </div>
                    </a>
                </div>
            <?php }?>

            <?php if($this->session->userdata('s_traslado')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'inventarios/traslados'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="far fa-copy fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>TRASLADOS</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_sesiones')) {
                $modules++;
            ?>
                <div class="col-md-4">
                    <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                            href="<?=base_url().'sistema/conexiones'?>">
                        <div class="row">
                            <div class="col-3 text-center"><i class="fas fa-users fa-2x"></i></div>
                            <div class="col-9 text-center pt-1"><strong>SESIONES ACTIVAS</strong></div>
                        </div>
                    </a>
                </div>
            <?php }?>

            <?php if($this->session->userdata('s_codigo_barra')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'inventario/codigos_barra'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-barcode fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>CODIGOS BARRA</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_vectorizar')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'bodega/vectorizacion'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-tasks fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>VECTORIZACION</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_iva_ordenes')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'compras/iva'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-file-invoice fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>IVA ORDENES</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_minimo')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'minimo'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-boxes fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>MINIMOS</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_costo')  ) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'inventarios/conteo/digitar'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-box-open fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>CONTEOS</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_gastos')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'inventarios/gastos'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-book-open fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>GASTOS LOGISTICA</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_ajuste_contabilidad')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'contabilidad/ajuste_documento'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-book-open fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>AJUSTE DOC CONTABLE</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_comercial')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'comercial/'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-chart-line fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>COMERCIAL</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_contabilidad')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'contabilidad/dashboard'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-book-open fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>CONTABILIDAD</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_reportes_comercial')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'comercial/reportes_comisiones'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-chart-bar fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>R. COMERCIAL</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_comisiones')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'comisiones'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-chart-bar fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>COMISIONES</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>

            <?php if($this->session->userdata('s_chequeo_precios')) {
                $modules++;
            ?>
            <div class="col-md-4">
                <a class="btn btn-lg <?=($modules%2 == 0) ? 'btn-outline-primary' : 'btn-primary text-white'?> btn-block mb-3"
                        href="<?=base_url().'chequeo_precios'?>">
                    <div class="row">
                        <div class="col-3 text-center"><i class="fas fa-balance-scale fa-2x"></i></div>
                        <div class="col-9 text-center pt-1"><strong>CHEQUEO PRECIOS</strong></div>
                    </div>
                </a>
            </div>
            <?php }?>
        
    </div>
</div>