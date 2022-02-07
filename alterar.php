<?php
session_start();
include('verifica_login.php');
include('config.php');
include_once "classes/Form.php"; 
Mysql::conectar();
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
  <div class="atua">
  <body>
  <!–Formulario de atualização dos dados do usuário recém cadastrado->
  
  <div class="atualizar">
  <?php
      
        
        if(isset($_POST['acao']) && $_POST['form'] == 'f_form'){
          //armazena nas variáveis os dados capturados dos inputs
          $_SESSION['nome'] = $_POST['nome_cliente'];
          $_SESSION['email'] = $_POST['email_cliente'];
          $_SESSION['telefone'] = $_POST['telefone_cliente'];  
         
          $_SESSION['data'] = $_POST['data_nasc_cliente']; 
        //verificações de preenchimento dos campos dos inputs
        if($_POST['nome_cliente'] == ''){//Verifica se o campo nome está preenchido
          Form::alert('erro', 'O campo de nome está vazio');
        }else if($_POST['email_cliente'] == ''){//Verifica se o email nome está preenchido
          Form::alert('erro', 'O campo de email está vazio');
        }else if($_POST['telefone_cliente']  == ''){//Verifica se o campo telefone está preenchido
          Form::alert('erro', 'O campo de telefone está vazio');
        }
        else if($_POST['senha_cliente'] == '' || $_POST['senha_cliente2'] == ''){//Verifica se os campos senha e confirmar senha estão preenchidos
          Form::alert('erro', 'O campo de senha está vazio');
        }
        else if($_POST['senha_cliente'] != $_POST['senha_cliente2']){//verifica se os campos senha e verificar senha estão com valores diferentes
          Form::alert('erro', 'Senhas não conferem');
        }
        else if($_POST['data_nasc_cliente']  == ''){//Verifica se o campo data está preenchido
          Form::alert('erro', 'O campo de data está vazio');
        }else{//se todos os campos estiverem preenchidos corretamente, está pronto para alterar os dados no banco
          Form::alterar($_SESSION['id'],$_POST['nome_cliente'],$_POST['email_cliente'],$_POST['telefone_cliente'],$_POST['senha_cliente'],$_POST['data_nasc_cliente']);//chama função alterar
          Form::alert('sucesso', 'Dados do usuário '.$_POST['nome_cliente']. ' atualizados com sucesso!');//mostra mensagem de que os dados foram atualizados com sucesso
          $_SESSION['senha'] = $_POST['senha_cliente'];
        }

        }
      ?>
      
      
      <h2>Atualizar dados</h2>
   <form method="POST">
    <div class="atual"><input type="text" id="nome" name="nome_cliente" placeholder="nome" value="<?php echo $_SESSION['nome'] ?>"></div>
    <div id="em"><input type="email" name="email_cliente" id="entradaEmail" placeholder="Email" onblur="checarEmail()" value="<?php echo $_SESSION['email'] ?>"></div>
    <div><input type="text" onblur="mascaraDeTelefone(this)" id="telefone"name="telefone_cliente" placeholder="telefone" onfocus="tiraHifen(this)" value="<?php echo $_SESSION['telefone'] ?>"></div>
    <div><input type="password" name="senha_cliente" onblur="escondeSenha()" onfocus="mostraSenha()" placeholder="senha" value="<?php echo $_SESSION['senha'] ?>" id="senha"></div>
    <div><input type="password" name="senha_cliente2" placeholder="confirmar senha" onblur="escondeSenha2()" onfocus="mostraSenha2()" value="<?php echo $_SESSION['senha'] ?>" id="senha2"></div>
    <div id="envio">Data de nascimento:<br><input type="date" name="data_nasc_cliente" value="<?php echo $_SESSION['data']?>"></div>
    <div id="btn2"><input type="submit" name="acao" value="atualizar"></div>
     <div id="btn2"><input type="button" class="deslogar" onclick="location.href='logout.php';"value="Deslogar"></input></div>
    <div><input type="hidden" name="form" value="f_form"></div>
</div>

   </form>
   </div>
  </body>
</html>