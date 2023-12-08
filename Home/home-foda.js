 // TRANSIÇÃO CHAPOLIM
 function changeChapolim() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim-estampa.png";
    var cardImage = document.getElementById("chapolim");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "Imagens-não-oficiais/chapolim-estampa.png";
      cardImage.style.opacity = 1;
  }, 300); // Aguarde 300 milissegundos (duração da transição) antes de alterar a imagem
}

function restoreChapolim() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim.png";
    var cardImage = document.getElementById("chapolim");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "Imagens-não-oficiais/chapolim.png";
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
      cardImage.src = "Imagens-não-oficiais/dc-estampa.png";
      cardImage.style.opacity = 1;
  }, 300); // Aguarde 300 milissegundos (duração da transição) antes de alterar a imagem
}

function restoreDC() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim.png";
    var cardImage = document.getElementById("camisa-dc");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "Imagens-não-oficiais/camisa-dc.png";
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
      cardImage.src = "Imagens-não-oficiais/marvel-estampa.png";
      cardImage.style.opacity = 1;
  }, 300); // Aguarde 300 milissegundos (duração da transição) antes de alterar a imagem
}

function restoreMarvel() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim.png";
    var cardImage = document.getElementById("camisa-marvel");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "Imagens-não-oficiais/marvel.png";
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
      cardImage.src = "Imagens-não-oficiais/star-wars-estampa.png";
      cardImage.style.opacity = 1;
  }, 300); // Aguarde 300 milissegundos (duração da transição) antes de alterar a imagem
}

function restoreStarWars() {
    // document.getElementById("chapolim").src = "../Imagens-não-oficiais/chapolim.png";
    var cardImage = document.getElementById("camisa-star-wars");
  cardImage.style.opacity = 0.5;
  setTimeout(function() {
      cardImage.src = "Imagens-não-oficiais/starwars.png";
      cardImage.style.opacity = 1;
  }, 300);
}