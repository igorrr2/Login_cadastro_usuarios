//Função para adicionar Hífen e paraenteses no número de telefone
function mascaraDeTelefone(telefone){
    const textoAtual = telefone.value;
    let textoAjustado;
          if(textoAtual.length===9){//se tiverem 9 números, não possui ddd, logo não terá os parênteses
          textoAjustado = textoAtual.replace(/(\d{5})(\d{4})/,
                        function( regex, arg1, arg2) {//insere o hífem entre os números
                        return arg1 + '-' + arg2 ;
                        });
        telefone.value = textoAjustado;     
          }
          else if(textoAtual.length === 11){// se tiverem 11 números, significa que terá que ter os parênteses e o hífen, e o número inserido é de um celular
            textoAjustado = textoAtual.replace(/(\d{2})(\d{5})(\d{4})/,
                        function( regex, arg, arg1, arg2) {
                        return'('+arg +')'  +arg1 + '-' + arg2 ;
                        });
        telefone.value = textoAjustado;  
          }
          else if(textoAtual.length === 10){//Se tiverem 10 números, significa que terá que ter os parênteses e o hífen e o número inserido é fixo
            textoAjustado = textoAtual.replace(/(\d{2})(\d{4})(\d{4})/,
                        function( regex, arg, arg1, arg2) {
                        return'('+arg +')'  +arg1 + '-' + arg2 ;
                        });
        telefone.value = textoAjustado;  
          }
         else if(textoAtual.length===8){//Se tiverem 8 números, significa que não terá que ter os parênteses terá que ter o hífen e o número inserido é fixo
        
        const parte1 = textoAtual.slice(0,4);
        const parte2 = textoAtual.slice(4,8);
        textoAjustado = `${parte1}-${parte2}`
        telefone.value = textoAjustado;
        }
        else{//Aqui 
          const parte1 = textoAtual.slice(0,4);
        const parte2 = textoAtual.slice(4,8);
        textoAjustado = `${parte1}${parte2}`
        telefone.value = textoAjustado;
        }
  }
  function tiraHifen(telefone) {//Função utilizada para remover o hífen quando o usuário clicar no input
    const textoAtual = telefone.value;
    const textoAjustado = textoAtual.replace(/\-/g, '');
    const textoAjustado1 = textoAjustado.replace(/\(/g, '');
    const textoAjustado2 = textoAjustado1.replace(/\)/g, '');
    telefone.value = textoAjustado2;
    
  }
  
  function mostraSenha(){//Função utilizada para mostrar a senha quando o usuário clicar no primeiro input, utilizado apenas na tela de atualizar usuário
  let input = document.querySelector('#senha');
  input.setAttribute('type', 'text');
  
  }
  function escondeSenha(){//Função utilizada para esconder a senha quando o usuário sair do foco do primeiro input, utilizado apenas na tela de atualizar usuário
  let input = document.querySelector('#senha');
   input.setAttribute('type', 'password');
  }
  function mostraSenha2(){//Função utilizada para mostrar a senha quando o usuário clicar no primeiro input, utilizado apenas na tela de atualizar usuário
  let input = document.querySelector('#senha2');
  input.setAttribute('type', 'text');
  
  }
  function escondeSenha2(){//Função utilizada para esconder a senha quando o usuário sair do foco do segundo input, utilizado apenas na tela de atualizar usuário
  let input = document.querySelector('#senha2');
   input.setAttribute('type', 'password');
  }
  