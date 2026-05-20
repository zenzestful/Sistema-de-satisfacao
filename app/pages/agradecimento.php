<?php 
    
    include('../bd/conect.php');
    $escolha = $_GET["acao"];
    Inserir($escolha);
    header("Refresh: 5; url=../index.php");
?>

<?php include('cabecalho.php'); ?>

<link rel="stylesheet" href="../css/style.css">

<main class="container-fluid">
    <section class="row">
        <div class="col-sm-12 text-center">
            <img src="../img/joinha.png" style="width: 15%;">
            <h2>OBRIGADO POR AVALIAR!!!<br>SUA OPNIÃO É MUITO IMPORTANTE</h2>
            <div class="spinner-border"></div>
        </div>
    </section>

</main>
<?php include('rodape.php')?>