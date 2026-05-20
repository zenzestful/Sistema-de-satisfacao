<?php
try {
    $host = getenv('DB_HOST') ?: 'mysql';
    $db = getenv('DB_NAME') ?: 'sistema_curso';
    $user = getenv('DB_USER') ?: 'user';
    $pass = getenv('DB_PASS') ?: 'senha4321';


    $pdo = new PDO(
        "mysql:host=$host;dbname=$db",
        $user,
        $pass
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conectado com Sucesso!!! <br>";
} catch (PDOException $e) {
    echo "Erro de Conexão <br>" . $e->getMessage();;
}

//Função Inserir os Dados no Banco
function Inserir($escolha)
{
    $pdo = $GLOBALS["pdo"];
    $data = new DateTime('now', new DateTimeZone('America/Araguaina'));
    $sql = $pdo->prepare("INSERT INTO avaliacao VALUES (null,?,?)");
    $sql->execute(array($escolha, $data->format('Y-m-d H:i:s')));
}

//Função Consultar do Banco
function Consultar($opcao)
{
    $pdo = $GLOBALS["pdo"];
    $sql = $pdo->prepare("SELECT COUNT(*) FROM avaliacao WHERE escolha = ?");
    $sql->execute(array($opcao));
    $retorno = $sql->fetchAll();

    foreach ($retorno as $key => $value) {
        echo $value['COUNT(*)'];
    }
}

//Função que verifica o login no Banco
function Verificar($usuario, $senha)
{
    $pdo = $GLOBALS["pdo"];

    $sql = $pdo->prepare("SELECT COUNT(*) FROM login_usuario WHERE usuario = ? and senha = md5(?)");
    $sql->execute(array($usuario, $senha));

    $consulta = $sql->fetchAll();

    foreach ($consulta as $key => $value) {
        $retorno = $value['COUNT(*)'];
    }

    return $retorno;

}


?>