const imgMenor1 = document.querySelector("#imgMenor1")
const imgMenor2 = document.querySelector("#imgMenor2")
const imgMenor3 = document.querySelector("#imgMenor3")
const imgMaior = document.querySelector("#imgMaior")

imgMenor1.addEventListener("click", function() {
    imgMaior.src = "../Imagens-não-oficiais/camisa2.png"
});

imgMenor2.addEventListener("click", function() {
    imgMaior.src = "../Imagens-não-oficiais/costas.png"
});

imgMenor3.addEventListener("click", function() {
    imgMaior.src = "../Imagens-não-oficiais/camisa1.png"
});