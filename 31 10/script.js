const btnMobile = document.getElementById('btn-mobile');
const ulMenu = document.querySelector('#menu');
var btn_close = document.querySelector('.close');

btnMobile.addEventListener('click', function(){
    ulMenu.classList.toggle('close');
});