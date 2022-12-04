// Botões para escolher o modo de envio da atividade

// Declaração de variaveis
// =======================
var title_att = document.querySelector("#att_title")
var tipoenvio = document.querySelector(".selectButtons");
// =======================
var btn_texto = document.querySelector('#btn_texto');
var btn_img = document.querySelector('#btn_img');
var btn_audio = document.querySelector('#btn_audio');
// =======================
var div_texto = document.querySelector("#div_texto");
var div_img = document.querySelector("#div_img");
var div_audio = document.querySelector("#div_audio");
// =======================

// Ações dos botões
// =======================
// Escrever texto
btn_texto.addEventListener('click', function(){
    title_att.classList.add('none');
    tipoenvio.classList.add('none');
    tipoenvio.classList.remove('selectButtons');
    div_texto.classList.remove('none');
});
// =======================
// Enviar imagem
btn_img.addEventListener('click', function(){
    title_att.classList.add('none');
    tipoenvio.classList.add('none');
    tipoenvio.classList.remove('selectButtons');
    div_img.classList.remove('none');
    img = document.querySelector("#submit_img");
    img.classList.remove('none');
});
// =======================
// Enviar áudio
btn_audio.addEventListener('click', function(){
    title_att.classList.add('none');
    tipoenvio.classList.add('none');
    tipoenvio.classList.remove('selectButtons');
    div_audio.classList.remove('none');
});
// =======================

// Preview de imagens
// =======================
let photo = document.getElementById('imgPhoto');
let file = document.getElementById('flImage');
let maxWidth = document.getElementsByClassName('max-width');

photo.addEventListener('click', () => {
    file.click();
});

file.addEventListener('change', (event) => {
    if(file.files.length <= 0){
        return;
    }
    let reader = new FileReader();
    reader.onload = () => {
        photo.src = reader.result;
    }
    reader.readAsDataURL(file.files[0]);
});

// =======================

// Sair / Logout da conta
// =======================
var exit = document.querySelector("#exit");
exit.addEventListener('click', function(){
    let confirmacao = "Deseja realmente sair?";
    if(confirm(confirmacao) === true){
        window.location.href='logout.php';
    }else{
        return;
    }
});
// =======================
