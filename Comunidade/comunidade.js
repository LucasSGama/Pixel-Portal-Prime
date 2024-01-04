// document.addEventListener('DOMContentLoaded', function() {
//     var criarBtn = document.getElementById('CriarBTN');
//     var cancelarBtn = document.getElementById('CancelarBTN');
//     var conteudoOculto = document.querySelector('.ocultar-conteudo');

//     criarBtn.addEventListener('click', function() {
//         // Alterna a classe para controlar a visibilidade do conteúdo
//         conteudoOculto.style.visibility = 'visible';
//     });

//     cancelarBtn.addEventListener('click', function() {
//         // Oculta a seção de comentários
//         conteudoOculto.style.visibility = 'hidden';
//     });

//     // Adicione lógica adicional conforme necessário
// });

document.addEventListener('DOMContentLoaded', function() {
    var criarBtn = document.getElementById('CriarBTN');
    var cancelarBtn = document.getElementById('CancelarBTN');
    var conteudoOculto = document.querySelector('.ocultar-conteudo');
    var h6 = document.getElementById('comentarios-postados');

    criarBtn.addEventListener('click', function() {
        // Alterna a classe para controlar a visibilidade do conteúdo
        conteudoOculto.style.display = 'block';

        // Adiciona a imagem de fundo quando a div é exibida
        conteudoOculto.style.backgroundImage = 'url(../Imagens-não-oficiais/background_comentario.jpg)';
        conteudoOculto.style.backgroundSize = 'cover';
        conteudoOculto.style.backgroundPosition = 'center center';
        h6.style.marginTop = '26px';
    });

    cancelarBtn.addEventListener('click', function() {
        // Oculta a seção de comentários
        conteudoOculto.style.display = 'none';
        h6.style.marginTop = '0';
    });

    // Adicione lógica adicional conforme necessário
});
