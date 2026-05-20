<?php
    session_start();
    include("../bd/conect.php");
    
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if(empty($usuario) ||  empty($senha)){
        header("Location: login.php");
        exit();
    }
    
    if(Verificar($usuario, $senha) == 1){
        $_SESSION['usuario'] = $usuario;
        header("Location: graficos.php");
        exit();
    }
    else{
        header("Location: login.php");
        exit();
    }



?>

