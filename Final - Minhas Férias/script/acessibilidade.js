const switcher = document.querySelector('#altoContraste');

// Localizando todos os elementos

// Header
var topHeader = document.querySelector(".top-header");
var topNav = document.querySelector(".topNav");

// Itens do site
var content = document.querySelector(".content");
// Botões
var btnAluno = document.querySelector(".btn_alunobox");
var btnRedirect = document.querySelector(".btn_redirect");
var btnOptnFirst = document.querySelector(".aluno_FirstAccess");
var btnOptnAccess = document.querySelector(".aluno_Access");
var InputFirst = document.querySelector(".inputAcesso");
var InputAccess = document.querySelector(".inputPrimeiroAcesso");

// Box aluno
var boxAluno = document.querySelector(".box_aluno");

// Footer
var footer = document.querySelector(".f1");

switcher.addEventListener('click', function(){
    // alert('click');
    // Colocar aqui a alternancia para o modo de alto contraste, um CSS do próprio site.
    
    document.body.classList.toggle('body_contrast');
    footer.classList.toggle('footer_contrast');
    topHeader.classList.toggle('top-header_contrast');
    topNav.classList.toggle('topNav_contrast');
    content.classList.toggle('content_contrast');
    btnAluno.classList.toggle("btn_contrast");
    btnRedirect.classList.toggle("btn_contrast");
    boxAluno.classList.toggle('aluno_contraste');
    btnOptnAccess.classList.toggle('btn_contrast');
    btnOptnFirst.classList.toggle('btn_contrast');
    InputFirst.classList.toggle('btn_contrast');
    InputAccess.classList.toggle('btn_contrast');
});

// const switcher = document.querySelector('.btn');

// switcher.addEventListener('click', function() {
//     document.body.classList.toggle('black-theme')

// var className = document.body.className;
// if(className == "light-theme") {
//     this.textContent = "Black"
// }else {
//     this.textContent = "Light";
// }

// console.log('current class name: + className');

// });