var inputLanguage = 'en-US';
var outputLanguage = 'ja-JP';
var inputApiLanguage = 'EN';
var outputApiLanguage = 'JA';

function changeFromLang(speakerSelectedApi,speakerSelected) {
    inputLanguage = speakerSelected
    inputApiLanguage = speakerSelectedApi;
    recognition.lang = inputLanguage;
}
function changeToLang(listenerSelectedApi,listenerSelected) {
    outputLanguage = listenerSelected;
    outputApiLanguage = listenerSelectedApi;                
}

const API_KEY = 'e6773c33-fd34-31e5-bfe2-a3a444d192f9:fx';
const API_URL = 'https://api-free.deepl.com/v2/translate';

function readAloud(text) {
    if ('speechSynthesis' in window) {
        const uttr = new SpeechSynthesisUtterance()
        uttr.lang = outputLanguage
        uttr.text = text
        window.speechSynthesis.speak(uttr)
    }
}
const startBtn = document.querySelector('#start-btn');
const stopBtn = document.querySelector('#stop-btn');
const inputDiv = document.querySelector('#input-div');
const outputDiv = document.querySelector('#output-div');

SpeechRecognition = webkitSpeechRecognition || SpeechRecognition;
var recognition = new SpeechRecognition();

recognition.lang = inputLanguage;
recognition.interimResults = true;
recognition.continuous = true;

let finalTranscript = ''; 
let isRecording = false;

recognition.onresult = (event) => {
    let interimTranscript = '';
    for (let i = event.resultIndex; i < event.results.length; i++) {
        let transcript = event.results[i][0].transcript;
        if (event.results[i].isFinal) {
            finalTranscript += transcript;
        } else {
            interimTranscript += transcript;
        }
    }
    inputDiv.innerHTML = finalTranscript + '<i style="color:#ddd;">' + interimTranscript + '</i>';
}

startBtn.onclick = () => {
    isRecording = true;
    recognition.start();
}

stopBtn.onclick = () => {
    if(isRecording) {
        recognition.stop();
        isRecording = false;
    }
}

recognition.onend = () => {
    if(finalTranscript) {
        translateAndDisplay(finalTranscript);
        finalTranscript = ''; // 翻訳後にテキストをクリア
    }
}

function translateAndDisplay(text) {
    let content = encodeURI('auth_key=' + API_KEY + '&text=' + text + '&source_lang=' + inputApiLanguage + '&target_lang=' + outputApiLanguage);
    let url = API_URL + '?' + content;

    fetch(url)
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error("Could not reach the API: " + response.statusText);
            }
        }).then(data => {
            let translatedText = data["translations"][0]["text"];
            outputDiv.innerHTML = translatedText;
            readAloud(translatedText);
        }).catch(error => {
            console.error('Error during translation:', error);
        });
}
