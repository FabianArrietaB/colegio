<?php
    session_start();

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    include "../../modelo/usuario.php";
    $usuario = new usuarios();

    echo $Usuario->ingresar($usuario, $password);

    // if(!empty($_POST["btningresar"])){
    //     if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
    //         $user_usuario = $_POST["usuario"];
    //         $user_contra = md5($_POST["password"]);
    //         $sql=$conexion->query("select * from usuarios where user_usuario='$user_usuario' and user_contra='$user_contra'");
    //         if ($datos=$sql->fetch_object()) {
    //             $_SESSION["nombre"]=$datos->user_nombre;
    //             header("location:../home/inicio.php");
    //         } else {
    //             echo "<script>
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Oops...!',
    //                 text: 'Usuario con el nombre $user_usuario no Existe.',
    //                 showConfirmButton: false,
    //                 timer: 1500
    //             })
    //             </script>";
    //         }
    //     } else {
    //         echo "<script>
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Oops...!',
    //             text: 'Campos estan Vacios.',
    //             showConfirmButton: false,
    //             timer: 1500
    //         })
    //         </script>";
    //     }
    // }
?>