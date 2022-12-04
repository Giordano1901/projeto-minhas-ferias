const recordAudio = () =>
  new Promise(async resolve => {
    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
    const mediaRecorder = new MediaRecorder(stream);
    let audioChunks = [];

    mediaRecorder.addEventListener('dataavailable', event => {
      audioChunks.push(event.data);
    });

    const start = () => {
      audioChunks = [];
      mediaRecorder.start();
    };

    const stop = () =>
      new Promise(resolve => {
        mediaRecorder.addEventListener('stop', () => {
          const audioBlob = new Blob(audioChunks, { type: 'audio/mp3; code=opus' });
          const audioUrl = URL.createObjectURL(audioBlob);
          const audio = new Audio(audioUrl);
          const play = () => audio.play();
          resolve({ audioChunks, audioBlob, audioUrl, play });
        });

        mediaRecorder.stop();
      });

    resolve({ start, stop });
  });

const sleep = time => new Promise(resolve => setTimeout(resolve, time));

const recordButton = document.querySelector('#record');
const stopButton = document.querySelector('#stop');
const savedAudioMessagesContainer = document.querySelector('#saved-audio-messages');
var audio_file = document.querySelector(".audio_aluno");
var audio_input = document.querySelector("#audio_input");

let recorder;
let audio;

recordButton.addEventListener('click', async () => {
  recordButton.classList.add('none');
  stopButton.classList.remove('none');  
  if (!recorder) {
    recorder = await recordAudio();
  }
  recorder.start();
});

stopButton.addEventListener('click', async () => {
  confirma = "Deseja encerrar a gravação do áudio?";
  if(confirm(confirma) === true){
    stopButton.classList.add('none');
    recordButton.classList.remove('none');
    audio = await recorder.stop();
    // savedAudioMessagesContainer.lastChild.remove(audio)
    save();
}});
function save(){
  const reader = new FileReader();
  reader.readAsDataURL(audio.audioBlob);
  // savedAudioMessagesContainer.lastChild.remove(audio);
  reader.onload = () => {
      audio_file.setAttribute('src', reader.result);
      const arquivo_audio = new File([reader.result], '.mp3', {
        type: 'audio/mp3',
        lastModified: new Date(),
      });
      const dataTransfer = new DataTransfer();
      dataTransfer.items.add(arquivo_audio);
      audio_input.files = dataTransfer.files;
      
      
      
      // const audio = document.createElement('audio');
      // audio.src = reader.result;
      // audio.controls = true;
      // audio.setAttribute('name', 'Aluno_audio');
      // savedAudioMessagesContainer.appendChild(audio);
  }
};