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
     