<?php
    session_start();
    
    if ($_SESSION['usuario']['rol'] == 4) {
        $filtro = '';
        if(isset($_GET['filtro'])){
            $filtro = $_GET['filtro'];
        }
        include "../../modelo/conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
        $sql = "SELECT
            ac.id_acudiente as idacudiente,
            ac.id_alumno as idalumno,
            ac.acu_nombre as nombre,
            ac.acu_cladoc as cladoc,
            ac.acu_docume as docume,
            ac.acu_ciudad as ciudad,
            ac.acu_direcc as direcc,
            ac.acu_estrat as estrat,
            ac.acu_telcel as telcel,
            ac.acu_correo as correo,
            ac.acu_estado as estado,
            a.alu_nombre as nomalu,
            g.gra_nombre as grado
            FROM acudientes as ac
            LEFT JOIN alumnos as a ON ac.id_alumno = a.id_alumno
            LEFT JOIN grados as g ON a.id_grado = g.id_grado
            WHERE a.alu_nombre
            LIKE '%$filtro%' || g.gra_nombre LIKE '%$filtro%' ||  a.alu_docume LIKE '%$filtro%' || ac.acu_nombre LIKE '%$filtro%' || ac.acu_docume
            ORDER BY ac.id_alumno ASC";
        $query = mysqli_query($conexion, $sql);
    } else {
        $filtro = '';
        if(isset($_GET['filtro'])){
            $filtro = $_GET['filtro'];
        }
        include "../../modelo/conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
        $sql = "SELECT
        ac.id_acudiente as idacudiente,
        ac.id_alumno as idalumno,
        ac.acu_nombre as nombre,
        ac.acu_cladoc as cladoc,
        ac.acu_docume as docume,
        ac.acu_ciudad as ciudad,
        ac.acu_direcc as direcc,
        ac.acu_estrat as estrat,
        ac.acu_telcel as telcel,
        ac.acu_correo as correo,
        ac.acu_estado as estado,
        a.alu_nombre as nomalu,
        g.gra_nombre as grado
        FROM acudientes as ac
        INNER JOIN alumnos as a ON ac.id_alumno = a.id_alumno
        INNER JOIN grados as g ON a.id_grado = g.id_grado
        WHERE ac.acu_estado = 1
        AND a.alu_nombre LIKE '%$filtro%' || g.gra_nombre LIKE '%$filtro%' ||  a.alu_docume LIKE '%$filtro%' || ac.acu_nombre LIKE '%$filtro%' || ac.acu_docume
        ORDER BY ac.id_alumno ASC";
        $query = mysqli_query($conexion, $sql);
    }
?>
<!-- inicio Tabla -->
<div class="table-responsive justify-content-center">
    <table class="table table-light text-center" id="Recargar">
        <thead>
            <tr>
                <th scope="col" >Alumno</th>
                <th scope="col" >Grado</th>
                <th scope="col" >Nombre Acudiente</th>
                <th scope="col" >Direccion</th>
                <th scope="col" >Celular</th>
                <th scope="col" >Correo</th>
                <th scope="col" >Estado</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($acudientes = mysqli_fetch_array($query)) { ?>
            <tr>
                <td> <?php echo $acudientes['nomalu']; ?> </td>
                <td> <?php echo $acudientes['grado']; ?></td>
                <td> <?php echo $acudientes['nombre']; ?></td>
                <td> <?php echo $acudientes['direcc']; ?></td>
                <td> <?php echo $acudientes['telcel']; ?></td>
                <td> <?php echo $acudientes['correo']; ?></td>
                <td>
                    <?php if ($acudientes['estado'] == 0) { ?>
                        <button class="btn btn-danger btn-sm" onclick="activaralumno(<?php echo $alumnos['idacudiente'] ?>, <?php echo $acudientes['estado'] ?>)">INACTIVO</button>
                    <?php } else if ($acudientes['estado'] == 1) { ?>
                        <button class="btn btn-success btn-sm" onclick="activaralumno(<?php echo $alumnos['idacudiente'] ?>, <?php echo $acudientes['estado'] ?>)">ACTIVO</button>
                    <?php } ?>
                </td>
                <td>
                    <button type="button" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#padre" onclick="detalleacudiente('<?php echo $acudientes['idacudiente']?>')"><i class="fa-solid fa-pen-to-square fa-xl"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>