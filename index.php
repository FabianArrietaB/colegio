
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="public/bootstrap5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="public/css/login.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="public/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="public/fontawesome/css/fontawesome.min.css">
        <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
        <script src="public/sweetalert2/sweetalert2.all.min.js"></script>
        <title>Inicio de sesión</title>
    </head>
    <body>
        <img class="wave" src="public/images/login/wave.png">
        <div class="container">
            <div class="img">
                <img src="public/images/login//bg.svg">
            </div>
            <div class="login-content">
                <form id="frmIngreso" method="post" onsubmit="return ingresar()">
                    <img src="public/images/login/avatar.svg">
                    <h2 class="title">BIENVENIDO</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>Usuario</h5>
                            <input id="usuario" type="text" class="input" name="usuario" title="ingrese su nombre de usuario" autocomplete="usuario" value="" require>
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5>Contraseña</h5>
                            <input type="password" id="password" class="input" name="password" title="ingrese su clave para ingresar" autocomplete="current-password" require>
                        </div>
                    </div>
                    <div class="view">
                        <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
                    </div>
                    <div class="text-center">
                        <a class="font-italic isai5" href="">Olvidé mi contraseña</a>
                    </div>
                    <input class="btn" title="click para ingresar" type="submit" value="INICIAR SESION">
                </form>
            </div>
        </div>
        <script src="public/fontawesome/js/fontawesome.min.js"></script>
        <script src="public/js/usuarios/main.js"></script>
        <script src="public/js/usuarios//main2.js"></script>
        <script src="public/jquery/jquery.min.js"></script>
        <script src="public/bootstrap5/js/bootstrap.js"></script>
        <script src="public/bootstrap5/js/bootstrap.bundle.js"></script>
        <script src="public/js/usuarios/ingreso.js"></script>
    </body>
</html>
