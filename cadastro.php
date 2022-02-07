<?php
session_start();
include('config.php');
include_once "classes/conexao.php";
// Mysql::conectar();
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
  <!–Formulario de cadastro dos dados do usuário->
    <div class="cadastro">
      <?php
        //verifica se possui o imput com o nome acao e um com o nome form que tem que ser iguais ao f_form
        if(isset($_POST['acao']) && $_POST['form'] == 'f_form'){
        //Cria as sessões, que serão usadas na tela de atualização do usuário
        //Essas sessões irão receber os dados capturados do input
         $_SESSION['nome'] = $_POST['nome_cliente'];
         $_SESSION['email'] = $_POST['email_cliente'];
         $_SESSION['telefone'] = $_POST['telefone_cliente'];  
         $_SESSION['senha'] = $_POST['senha_cliente'];
         $_SESSION['senha2'] = $_POST['senha_cliente2'];
         $_SESSION['data'] = $_POST['data_nasc_cliente']; 
        //Fazendo os tratamentos para impedir que seja inserido um usuário com algum campo não preenchido
        if($_SESSION['nome'] == ''){//Verifica se o campo nome está preenchido
          Form::alert('erro', 'O campo de nome está vazio');
        }else if($_SESSION['email'] == ''){//Verifica se o campo email está preenchido
          Form::alert('erro', 'O campo de email está vazio');
        }else if($_SESSION['telefone'] == ''){//Verifica se o campo telefone está preenchido
          Form::alert('erro', 'O campo de telefone está vazio');
        }
        else if($_SESSION['senha'] == '' || $_SESSION['senha2'] ==''){//Verifica se os campos senha e confirmar senha estão preenchidos
          Form::alert('erro', 'O campo de senha está vazio');
        }
        else if($_SESSION['senha'] != $_SESSION['senha2']){//verifica se os campos senha e verificar senha estão com valores diferentes
          Form::alert('erro', 'Senhas não conferem');
        }
        else if($_SESSION['data'] == ''){//Verifica se o campo data está preenchido
          Form::alert('erro', 'O campo de data está vazio');
        }else{//se todos os campos estiverem preenchidos corretamente, está pronto para inserir os dados no banco
          //chama função cadastrar, passando os dados para serem inseridos
          Form::cadastrar($_SESSION['nome'],$_SESSION['email'],$_SESSION['telefone'],$_SESSION['senha'],$_SESSION['data']);
          //Imprime uma mensagem falando que o usuário foi inserido com sucesso.
          Form::alert('sucesso', 'Usuário '.$_SESSION['nome']. ' cadastrado com sucesso! Faça login.');

        }

        }
      ?>
      
      <h2>Cadastro de usuário</h2>
      <form method="POST">
    <div><input type="text" name="nome_cliente" placeholder="nome"></div>
    <div><input type="email" id="em" name="email_cliente" id="entradaEmail" placeholder="Email" onblur="checarEmail()"></div>
    <div><input type="text" onblur="mascaraDeTelefone(this)" name="telefone_cliente" placeholder="telefone" onfocus="tiraHifen(this)"></div>
    <div><input type="password" name="senha_cliente" placeholder="senha"></div>
    <div><input type="password" name="senha_cliente2" placeholder="confirmar senha"></div>
    <div id="envio">Data de nascimento:<br><input type="date" name="data_nasc_cliente" value="data"></div>
    <div id="btn"><input type="submit" name="acao" value="cadastrar"></div>
    <div><input type="hidden" name="form" value="f_form"></div>

   </form>
   </div>
    
  </body>
</html>