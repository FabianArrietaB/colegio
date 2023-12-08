<?php
    include "conexion.php";

    class Config extends Conexion {

        public function agregarparafiscal($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO parafiscales (id_tipo, par_codigo, par_nit, par_nombre, par_regimen) VALUES(?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("issss", $datos['idtip'], $datos['codigo'], $datos['nit'], $datos['nombre'], $datos['regimen']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function agregarpais($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO pais (pais_nombre) VALUES(?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("s", $datos['nombre']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detalleparafiscal($idparafiscal){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                p.id_parafiscal AS idparafiscal,
                p.id_tipo       AS idtip,
                p.par_codigo    AS codigo,
                p.par_nit       AS nit,
                p.par_nombre    AS nombre,
                p.par_regimen   AS regimen
                FROM parafiscales AS p
                WHERE p.id_parafiscal ='$idparafiscal'";
            $respuesta = mysqli_query($conexion,$sql);
            $grados = mysqli_fetch_array($respuesta);
            $datos = array(
            'idparafiscal' => $grados['idparafiscal'],
            'idtip' => $grados['idtip'],
            'codigo' => $grados['codigo'],
            'nit' => $grados['nit'],
            'nombre' => $grados['nombre'],
            'regimen' => $grados['regimen']
            );
            return $datos;
        }

        public function editarparafiscal($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE parafiscales SET id_tipo = ?, par_codigo = ?, par_nit = ?, par_nombre = ?, par_regimen = ? WHERE id_parafiscal = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('issssi', $datos['idtip'], $datos['codigo'], $datos['nit'], $datos['nombre'], $datos['regimen'], $datos['idparafiscal']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function detalleempresa($idusuario){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                s.id_sedes   AS idsede,
                s.id_tipo    AS idtip,
                s.sed_razsoc AS razsoc,
                s.sed_nombre AS nombre,
                s.sed_nit    AS nit,
                s.sed_correo AS correo,
                s.sed_pagina AS pagina,
                s.sed_telcel AS telcel,
                s.sed_direcc AS direcc,
                s.sed_tipper AS tipper,
                s.sed_regime AS regime,
                s.sed_pais   AS pais,
                s.sed_depart AS depart,
                s.sed_muni   AS muni,
                s.sed_estado AS estado
                FROM sedes AS s
                INNER JOIN usuarios as u ON u.id_sede = s.id_sedes
                WHERE u.id_usuario ='$idusuario'";
            $respuesta = mysqli_query($conexion,$sql);
            $sede = mysqli_fetch_array($respuesta);
            $datos = array(
            'idsede' => $sede['idsede'],
            'idtip' => $sede['idtip'],
            'razsoc' => $sede['razsoc'],
            'nombre' => $sede['nombre'],
            'nit' => $sede['nit'],
            'correo' => $sede['correo'],
            'pagina' => $sede['pagina'],
            'telcel' => $sede['telcel'],
            'direcc' => $sede['direcc'],
            'tipper' => $sede['tipper'],
            'regime' => $sede['regime'],
            'pais' => $sede['pais'],
            'depart' => $sede['depart'],
            'muni' => $sede['muni'],
            );
            return $datos;
        }

        public function editarempresa($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE sedes SET id_tipo = ?, sed_razsoc = ?, sed_nombre = ?, sed_nit = ?, sed_correo = ?, sed_pagina = ?, sed_telcel = ?, sed_direcc = ?, sed_tipper = ?, sed_regime = ?, sed_pais = ?, sed_depart = ?, sed_muni = ? WHERE id_sedes = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('issssssssssssi', $datos['idtip'], $datos['razsoc'], $datos['nombre'], $datos['nit'], $datos['correo'], $datos['pagina'], $datos['telcel'], $datos['direcc'], $datos['tipper'], $datos['regime'], $datos['pais'], $datos['depart'], $datos['muni'], $datos['idsede']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function agregarmovimiento($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO movimientos (mov_nombre, mov_detall, mov_operad, mov_usuari) VALUES(?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("ssii", $datos['nombre'], $datos['detalle'], $datos['idoperador'], $datos['idoperador']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function detallemovimiento($idmovimiento){
            $conexion = Conexion::conectar();
            $sql ="SELECT
                m.id_tipmov AS codigo,
                m.mov_nombre AS nombre,
                m.mov_detall AS detall,
                m.mov_estado AS estado,
                m.mov_operad AS operad,
                m.mov_usuari AS usuari,
                m.mov_fecope AS fecope,
                m.mov_fecupd AS fecupd
            FROM movimientos AS m
            WHERE m.id_tipmov ='$idmovimiento'";
            $respuesta = mysqli_query($conexion,$sql);
            $sede = mysqli_fetch_array($respuesta);
            $datos = array(
            'codigo' => $sede['codigo'],
            'nombre' => $sede['nombre'],
            'detall' => $sede['detall'],
            'estado' => $sede['estado'],
            'operad' => $sede['operad'],
            'usuari' => $sede['usuari'],
            'fecope' => $sede['fecope'],
            'fecupd' => $sede['fecupd'],
            );
            return $datos;
        }

        public function editarmovimiento($datos){
            $conexion = Conexion::conectar();
            $sql = "UPDATE movimientos SET mov_nombre = ?, mov_detall = ?, mov_estado = ?, mov_usuari = ? WHERE id_tipmov = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssiii', $datos['nombre'], $datos['datalle'], $datos['estado'], $datos['idoperador'], $datos['idmovimiento']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>