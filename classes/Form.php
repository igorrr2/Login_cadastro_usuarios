<?php

class Form{

  public static function alert($tipo, $mensagem){
     
    if($tipo == 'erro'){
      echo '<div style="color:red; font-size:25px;">'.$mensagem.'</div>';
      return false;//retorna falso para a página do index não atulizar
    }else if($tipo == 'sucesso'){
      echo '<div style="color:green; font-size:25px;">'.$mensagem.'</div>';
      return true;
    }

  }
    public static function cadastrar($nome_cliente, $email_cliente,$telefone_cliente, $senha_cliente, $data_nasc_cliente){
        $sql = Mysql::conectar()->prepare("INSERT INTO `cadastrousuarios` VALUES (NULL,?,?,?,?,?)");
        $sql->execute(array($nome_cliente, $email_cliente, $telefone_cliente, $senha_cliente, $data_nasc_cliente));

}
    public static function alterar($id,$nome_cliente, $email_cliente,$telefone_cliente, $senha_cliente, $data_nasc_cliente){
      $servidor = "localhost";
      $usuario = "root";
      $senha = "";
      $dbname = "usuarios";
      
      $conn = mysqli_connect($servidor,$usuario,$senha,$dbname);
      
      
      
      $result="UPDATE cadastrousuarios SET nome_cliente = '$nome_cliente', email_cliente = '$email_cliente', telefone_cliente = '$telefone_cliente',senha_cliente = '$senha_cliente', data_nasc_cliente = '$data_nasc_cliente' WHERE id_cliente = '$id'";
       $resultadofinal = mysqli_query($conn,$result);


} 
}


?>