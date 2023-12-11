    // FUNÇÃO PARA MOSTRAR A SENHA
    function mostrarSenha(id) {
        const input = document.getElementById(id);
        const icon = document.querySelector(`#${id} + .show-password i`);
  
        if (input.type === 'password') {
          input.type = 'text';
          icon.classList.remove('bi-eye-slash');
          icon.classList.add('bi-eye');
        } else {
          input.type = 'password';
          icon.classList.remove('bi-eye');
          icon.classList.add('bi-eye-slash');
        }
      }
  
      // FUNÇÃO PARA VALIDAR A SENHA NO INPUT CONFIRME A SENHA
      let senha = document.getElementById('senha');
      let confirmaSenha = document.getElementById('confirmaSenha');
  
  function validarSenha() {
    if (senha.value != confirmaSenha.value) {
      confirmaSenha.setCustomValidity("Senhas diferentes!");
      confirmaSenha.reportValidity();
      return false;
    } else {
      confirmaSenha.setCustomValidity("");
      return true;
    }
  }
  
  // verificar também quando o campo for modificado, para que a mensagem suma quando as senhas forem iguais
  confirmaSenha.addEventListener('input', validarSenha);
  
  // VALIDAR O EMAIL
      let email = document.getElementById('email');
      let ConfirmarEmail = document.getElementById('ConfirmarEmail');
  
  function validarEmail() {
    if (email.value != ConfirmarEmail.value) {
      ConfirmarEmail.setCustomValidity("Emails diferentes!");
      ConfirmarEmail.reportValidity();
      return false;
    } else {
      ConfirmarEmail.setCustomValidity("");
      return true;
    }
  }
  
