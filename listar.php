<?php
include('config.php');
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "usuarios";

$conn = mysqli_connect($servidor,$usuario,$senha,$dbname);
$consulta = "SELECT * FROM cadastrousuarios";
$con = mysqli_query($conn,$consulta) or die($mysqli->error);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>replit</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="script.js"></script>
  </head>
  <body>
    <header>
    
    <div><a href="index.php">Login</a></div>
    <div><a href="cadastro.php">Cadastrar</a></div>
    <div><a href="listar.php">Listar usuários</a></div>
    </header>
    <div id="table">
    <table id="tabela" border="1">
        <tr>
            <td>Id cliente</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Telefone</td>
            <td>Data de nascimento</td>
        </tr>
        <?php 
        
        while($dado = $con->fetch_array()){ ?>
        <tr>
            <td><?php echo $dado["id_cliente"]; ?></td>
            <td><?php echo $dado["nome_cliente"]; ?></td>
            <td><?php echo $dado["email_cliente"]; ?></td>
            <td><?php echo $dado["telefone_cliente"]; ?></td>
            <td><?php echo date("d/m/y", strtotime($dado["data_nasc_cliente"])); ?></td>
        </tr>
        <?php } ?>
    </table>
    </div>
  </body>
</html>