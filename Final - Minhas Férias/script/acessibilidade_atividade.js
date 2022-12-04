// Texto da atividade
att_title = document.querySelector("#att_title");
title = document.querySelector(".title");

switcher.addEventListener('click', function(){
    title.classList.toggle("title_contrast");
    att_title.classList.toggle("enunciado_contrast");
});