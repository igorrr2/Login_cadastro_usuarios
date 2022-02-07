<?php
session_start();
include_once "classes/Form.php";
include_once "classes/conexao.php";


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
  
    <div class="login">
      <?php


        //verifica se possui o imput com o nome acao e um com o nome form que tem que ser iguais ao f_form
        if(isset($_POST['acao']) && $_POST['form'] == 'f_form'){
          
        //Cria as sessões, que serão usadas na tela de atualização do usuário
        //Essas sessões irão receber os dados capturados do input
        $verificador = 0;
         $_SESSION['email'] = $_POST['email_cliente'];  
         $_SESSION['senha'] = $_POST['senha_cliente'];
        
          
          
        if($_POST['email_cliente'] == ''){//Verifica se o campo email está preenchido
          Form::alert('erro', 'O campo de email está vazio');
        }
        else if($_POST['senha_cliente'] == ''){//Verifica se os campos senha e confirmar senha estão preenchidos
          Form::alert('erro', 'O campo de senha está vazio');
        }
        else{
         
          $result="SELECT * FROM cadastrousuarios ORDER BY id_cliente DESC";
          $resultadofinal=mysqli_query($conn, $result);
          if(($resultadofinal) AND ($resultadofinal->num_rows != 0)){
            while($row_usuario = mysqli_fetch_assoc($resultadofinal)){
              if($row_usuario['email_cliente'] == $_SESSION['email'] && $row_usuario['senha_cliente'] == $_SESSION['senha']){
              $_SESSION['id']=$row_usuario['id_cliente'];
          $_SESSION['telefone'] = $row_usuario['telefone_cliente'];
          $_SESSION['nome'] = $row_usuario['nome_cliente'];
          $_SESSION['data'] = $row_usuario['data_nasc_cliente'];
          $verificador = 1
          ?>
                 <script>
                 
                
                window.location.replace("alterar.php");
                </script>
                <?php
                break;
            }
            }
            if($verificador == 0){
                Form::alert('erro', 'Login inválido');
            }
           }
           else{
             Form::alert('erro', 'Login inválido');
           }
        }
        }
?>
        
      
    <h2>Login</h2>
      <form method="POST">
    <div><input type="email" id="em" name="email_cliente" id="entradaEmail" placeholder="Email" onblur="checarEmail()"></div>
  
    <div><input type="password" name="senha_cliente" placeholder="senha"></div>
    <div id="btn"><input type="submit" name="acao" value="Login"></div>
    <div><input type="hidden" name="form" value="f_form"></div>

   </form>
   </div>
    
  </body>
</html>