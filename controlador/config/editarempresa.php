<?php
    $datos = array(
        'idsede' => $_POST['idsede'],
        'idtip' => $_POST['idtipu'],
        'razsoc' => $_POST['razsocu'],
        'nombre'  => $_POST['nombreu'],
        'nit'  => $_POST['nitu'],
        'correo'  => $_POST['correou'],
        'pagina'  => $_POST['paginau'],
        'telcel'  => $_POST['telcelu'],
        'direcc'  => $_POST['direccu'],
        'tipper'  => $_POST['tipperu'],
        'regime'  => $_POST['regimeu'],
        'pais'  => $_POST['paisu'],
        'depart'  => $_POST['departu'],
        'muni'  => $_POST['muniu'],
    );
    include "../../modelo/config.php";
    $idsede = new Config();
    echo $idsede->editarempresa($datos);
?>