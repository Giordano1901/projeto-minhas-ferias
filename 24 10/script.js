'use strict'

let photo = document.getElementById('imgPhoto');
let file = document.getElementById('flImage');

photo.addEventListener('click', () => {
    file.click();
});

file.addEventListener('change', (event) => {

    if(file.files.length <= 0){
        return;
    }

    let reader = new FileReader();

    reader.onload = () => {
        photo.src = reader.result
    }

    reader.readAsDataURL(file.files[0]);
});

const deviceStatus = document.querySelector('.device-status');
const snackbar = () => {
    setTimeout(() => {
        deviceStatus.classList.add('hide');
    }, 8000)
}
navigator.permissions.query({
    name: 'microphone'
})
.then(function(result){
    console.log(result)
    if(result.state === 'garanted'){
        deviceStatus.innerHTML = 'Device access granted'
        snackbar()
    }
    if(result.state === 'prompt'){
        deviceStatus.innerHTML = 'Accept access devices request'
        snackbar()
    }
    if(result.state === 'denied'){
        deviceStatus.innerHTML = 'Please enable Microphone'
        snackbar()
    }
})
