// Botão do menu no mobile
const btnMobile = document.getElementById('btn-mobile');
const ulMenu = document.querySelector('#menu');

btnMobile.addEventListener('click', function(){
    ulMenu.classList.toggle('close');
});
// =======================
// Popup do acesso: Geral
// DECLARAÇÃO DE VARIAVEIS E ID DE BOTÕES

// === Botões aluno
var btn_aluno = document.querySelector("#aluno");
var box_aluno = document.querySelector(".box_aluno");
var btnOpcoes_aluno = document.querySelector('.opcaoAluno');
var box_close_aluno = document.querySelector(".to_close_aluno");
var formAcesso_aluno = document.querySelector('.formAcesso_aluno');
var formPrimeiroAcesso_aluno = document.querySelector('.formFirstAccess_aluno');
var acessoAluno = document.querySelector('#aluno_Access');
var firstAccessAluno = document.querySelector('#aluno_FirstAccess');

// === Redirect
var btn_visualizar = document.querySelector("#redirectBtn");

// ====
btn_visualizar.addEventListener('click', function(){
    window.location.href='minhasferias_visualizar.php';
});

// =======================
btn_aluno.addEventListener('click', function(){
    box_aluno.classList.remove('none');
    formAcesso_aluno.classList.add('none');
    if(btnOpcoes_aluno.classList.contains('opcaoAluno') === false){
        btnOpcoes_aluno.classList.add('opcaoAluno');
        btnOpcoes_aluno.classList.remove('none');
        formAcesso_aluno.classList.add('none');
        formPrimeiroAcesso_aluno.classList.add('none');
        
    }
});
btn_aluno.addEventListener('click', () => {
    firstAccessAluno.focus();
})
box_close_aluno.addEventListener('click', function(){
    if(box_aluno.classList.contains("none") === false){
        box_aluno.classList.add("none");
    }else{
        return;
    }
});
// === Botões dentro da caixa do aluno
acessoAluno.addEventListener('click', function(){
    btnOpcoes_aluno.classList.remove('opcaoAluno');
    btnOpcoes_aluno.classList.add('none');
    formAcesso_aluno.classList.remove('none');
});
firstAccessAluno.addEventListener('click', function(){
    btnOpcoes_aluno.classList.remove('opcaoAluno');
    btnOpcoes_aluno.classList.add('none');
    formPrimeiroAcesso_aluno.classList.remove('none');
});