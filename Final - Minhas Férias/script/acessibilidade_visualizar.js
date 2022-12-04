// Visualizar
title = document.querySelector(".title");
enunciado = document.querySelector(".enunciado")

switcher.addEventListener('click', function(){
    title.classList.toggle("title_contrast");
    enunciado.classList.toggle("enunciado_contrast")
});