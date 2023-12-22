 // TRANSIÇÃO CHAPOLIM
 function changeChapolim() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim-estampa.png";
    var cardImage = document.getElementById("chapolim");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "../Imagens-não-oficiais/Camisas/Camisas-chapolim/chapolim-estampa.png";
      cardImage.style.opacity = 1;
  }, 300); // Aguarde 300 milissegundos (duração da transição) antes de alterar a imagem
}

function restoreChapolim() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim.png";
    var cardImage = document.getElementById("chapolim");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "../Imagens-não-oficiais/Camisas/Camisas-chapolim/chapolim.png";
      cardImage.style.opacity = 1;
  }, 300);
}
// ________________________________________________________________________________

// TRANSIÇÃO DC
function changeDC() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim-estampa.png";
    var cardImage = document.getElementById("camisa-dc");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "../Imagens-não-oficiais/Camisas/Camisas-DC/camisa-dc2.jpg";
      cardImage.style.opacity = 1;
  }, 300); // Aguarde 300 milissegundos (duração da transição) antes de alterar a imagem
}

function restoreDC() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim.png";
    var cardImage = document.getElementById("camisa-dc");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "../Imagens-não-oficiais/Camisas/Camisas-DC/camisa-dc1.png";
      cardImage.style.opacity = 1;
  }, 300);
}
// _________________________________________________________________________

// TRANSIÇÃO MARVEL
function changeMarvel() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim-estampa.png";
    var cardImage = document.getElementById("camisa-marvel");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "../Imagens-não-oficiais/Camisas/Camisas-Marvel/camisa-marvel2.png";
      cardImage.style.opacity = 1;
  }, 300); // Aguarde 300 milissegundos (duração da transição) antes de alterar a imagem
}

function restoreMarvel() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim.png";
    var cardImage = document.getElementById("camisa-marvel");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "../Imagens-não-oficiais/Camisas/Camisas-Marvel/camisa-marvel1.png";
      cardImage.style.opacity = 1;
  }, 300);
}
// _________________________________________________________________________

// TRANSIÇÃO STAR WARS
function changeStarWars() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim-estampa.png";
    var cardImage = document.getElementById("camisa-star-wars");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "../Imagens-não-oficiais/Camisas/Camisas-StarWars/camisa-starwars2.png";
      cardImage.style.opacity = 1;
  }, 300); // Aguarde 300 milissegundos (duração da transição) antes de alterar a imagem
}

function restoreStarWars() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim.png";
    var cardImage = document.getElementById("camisa-star-wars");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "../Imagens-não-oficiais/Camisas/Camisas-StarWars/camisa-starwars1.png";
      cardImage.style.opacity = 1;
  }, 300);
}


// BOTÃO DE MOSTRAR MAIS

document.addEventListener('DOMContentLoaded', function() {
  var verMaisBtn = document.getElementById('verMaisBtn');
  var conteudoOculto = document.querySelector('.ocultar-conteudo');

  verMaisBtn.addEventListener('click', function() {
      // Alterna a classe para controlar a visibilidade do conteúdo
      conteudoOculto.classList.toggle('ocultar-conteudo');

      // Alterna o texto do botão entre "Ver Mais" e "Mostrar Menos"
      var textoAtual = verMaisBtn.textContent.trim();
      verMaisBtn.textContent = (textoAtual === 'Mostrar Mais') ? 'Mostrar Menos' : 'Mostrar Mais';
  });
});
