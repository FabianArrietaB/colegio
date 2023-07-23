<?php
    include "conexion.php";
    class Pagos extends Conexion {

        public function detallepension($idmatricula){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                m.id_matricula as idmatriculau,
                m.id_alumno as idalumnou,
                m.id_grado as idgradou,
                m.mat_pensio as pension,
                a.alu_nombre as nomaluu,
                g.gra_nombre as gradou
                FROM matriculas AS m
                INNER JOIN alumnos as a ON m.id_alumno = a.id_alumno
                INNER JOIN grados as g ON m.id_grado = g.id_grado
                WHERE m.id_matricula ='$idmatricula'";
            $respuesta = mysqli_query($conexion,$sql);
            $matricula = mysqli_fetch_array($respuesta);
            $datos = array(
            'idmatriculau' => $matricula['idmatriculau'],
            'idalumnou'    => $matricula['idalumnou'],
            'nomaluu'      => $matricula['nomaluu'],
            'idgradou'     => $matricula['idgradou'],
            'gradou'       => $matricula['gradou'],
            'pension'      => $matricula['pension'],
            );
            return $datos;
        }

        public function pagopension($datos){
            $conexion = Conexion::conectar();
            $fecha = date("Y-m-d");
            $sql = "UPDATE matriculas SET mat_fecpen = ?, mat_fecpropag = ?, id_tipopago = ? WHERE id_matricula = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssii', $fecha, $datos['fecpro'], $datos['idtippagou'], $datos['idmatriculau']);
            $respuesta = $query->execute();
            if ($respuesta > 0) {
                $crearfactura = "INSERT INTO facturas (id_operador, id_alumno, id_tippag, fac_valor, fac_detalle, fac_fecope) VALUES (?, ?, ?, ?, ?, ?)";
                $query = $conexion->prepare($crearfactura);
                $tipag = 2;
                if ($datos['mes'] == 1) {
                    $mes = 'ENERO';
                } else if ($datos['mes'] == 2) {
                    $mes = 'FEBRERO';
                } else if ($datos['mes'] == 3) {
                    $mes = 'MARZO';
                } else if ($datos['mes'] == 4) {
                    $mes = 'ABRIL';
                } else if ($datos['mes'] == 5) {
                    $mes = 'MAYO';
                } else if ($datos['mes'] == 6) {
                    $mes = 'JUNIO';
                } else if ($datos['mes'] == 7) {
                    $mes = 'JULIO';
                } else if ($datos['mes'] == 8) {
                    $mes = 'AGOSTO';
                } else if ($datos['mes'] == 9) {
                    $mes = 'SEPTIEMBRE';
                } else if ($datos['mes'] == 10) {
                    $mes = 'OCTUBRE';
                } else if ($datos['mes'] == 11) {
                    $mes = 'NOVIEMBRE';
                } else if ($datos['mes'] == 12) {
                    $mes = 'DICIEMBRE';
                }
                $detalle = 'PAGO PENSION MES ' . $mes;
                $query->bind_param("iiisss", $datos['idoperador'], $datos['idalumnou'], $tipag, $datos['pension'], $detalle, $fecha);
                $respuesta = $query->execute();
                $idfactura = $conexion->insert_id;
                $insertauditoria = "INSERT INTO auditorias( id_operador, id_alumno, id_grado, aud_valor, id_tipopago, aud_mespro, aud_numdoc) VALUES(?, ?, ?, ?, ?, ?, ?)";
                $query = $conexion->prepare($insertauditoria);
                $query->bind_param("iiiisss",  $datos['idoperador'], $datos['idalumnou'],  $datos['idgradou'], $datos['pension'], $tipag, $datos['mes'], $idfactura);
                $respuesta = $query->execute();
            }
            return $respuesta;
        }
    }
?>