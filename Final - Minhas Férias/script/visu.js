// Zoom da imagem do aluno
// =======================
var imagem = document.getElementById("imgAluno");
var focusImagem = document.querySelector("#focusLock");

imagem.addEventListener('click', function(){
    // alert('click');
    focusImagem.classList.remove('none');
});

focusImagem.addEventListener('click', function(){
    focusImagem.classList.add('none');
});