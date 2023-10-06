let totalTypedChars = 0;
let totalTypedWords = 0;
let totalErrors = 0;

let startTime;
let countdownInterval;



let curPoz = 0;
let totalPoz = 0;
let lastInputLength = 0;
let docElem = document.getElementById(0);
let docContent = "";
let error = false;

const raceFinishedMessage = document.getElementById('race-finished');
const raceFinishedHr = document.getElementById('race-finished-hr');
const userInput = document.getElementById('user-input');
const countdownValue = document.getElementById('countdown-value');
const codeSnippetContainer = document.getElementById("code-snippet");
const raceProgress = document.getElementById("race-progress");


userInput.addEventListener('input', checkInput);

userInput.addEventListener('blur', () => {
    userInput.dataset.lastCursorPosition = userInput.selectionEnd;
});

userInput.addEventListener('click', (event) => {
    const lastCursorPosition = userInput.value.length;
    userInput.setSelectionRange(lastCursorPosition, lastCursorPosition);
    userInput.focus();
    event.stopPropagation();
});




userInput.addEventListener('paste', (event) => {
    event.preventDefault();
});


userInput.addEventListener('contextmenu', (event) => {
    event.preventDefault();
});

userInput.addEventListener('keydown', (event) => {
    if (error && event.key !== 'Backspace') {
        event.preventDefault();
        return; 
    }
    
    if (isArrowKey(event.key)) {
        event.preventDefault();
        return; 
    }
    
    if (event.key === 'Enter') {
        event.preventDefault();
        userInput.value += '⏎';  
        checkInput(); 
    }
});


userInput.addEventListener('mousedown', (event) => {
    event.preventDefault();
});



function isArrowKey(key) {
    return ['ArrowLeft', 'ArrowRight', 'ArrowUp', 'ArrowDown'].includes(key);
}


const countdownElementStart = document.getElementById("countdown");
const countdownContainerStart = document.getElementById("countdown-container");
const mainContainer = document.getElementById("main-container");
const countNumbers = ["3","2","1","Go!","-1","start"];
let countdownTime = 0;


function startCountdown(duration) {
    let remainingTime = duration;
    countdownInterval = setInterval(() => {
        if (remainingTime <= 0) {
            clearInterval(countdownInterval);
            gameOver(true);
        } else if (!userInput.disabled){
            countdownValue.textContent = remainingTime;
            remainingTime--;
        }
    }, 1000);
    
}



function startCountdownTimer() {
    countdownElementStart.textContent = countNumbers[countdownTime];
    countdownElementStart.classList.remove("countdown-item");
    countdownContainerStart.offsetWidth; 
    countdownElementStart.classList.add("countdown-item");
    countdownTime++

    if (countNumbers[countdownTime] == "start") {
        countdownElementStart.style.opacity = 0;
        startCountdown(countdownDuration);
        mainContainer.removeChild(countdownContainerStart);
        userInput.disabled = false;
        userInput.focus();
        return;
    }

    setTimeout(startCountdownTimer, 1000);
}

function startGame() {
    userInput.disabled = true;
    startTime = new Date().getTime();
    startCountdownTimer();
    showNextWord();
}

function showNextWord() {
    userInput.value = '';
//    generateCodeSnippet();
    setCursor(0);
}


function testNextWord(inputLength){
    const nextElem = document.getElementById(curPoz+1);
    if (nextElem != null ){
        const nextContent = nextElem.textContent.replace(/\s+/g, ' ');

        if (nextContent == '⏎' || nextContent == ' ' || (docContent == ' ' && nextContent != ' ') || (docContent == '⏎' && nextContent != ' ')) {
            totalPoz += inputLength;
            userInput.value = ''; 
            totalTypedWords++;
        }
    }else{
        totalTypedWords++;
    }
}
function clearCursor(poz){
    const nextElem = document.getElementById(poz);
    if (nextElem !== null){
        nextElem.classList.remove('correct','incorrect','cursor');
    }
}

function setCursor(poz){
    const nextElem = document.getElementById(poz);
    if (nextElem !== null){
        clearCursor(poz);
        nextElem.classList.add('cursor');
    }
}

function checkInput() {
    const input = userInput.value;
    const inputLength = input.length;


    if (inputLength < lastInputLength) {
        clearCursor(totalPoz + lastInputLength);
        error = false;
    }

    curPoz = totalPoz + inputLength - 1;

    if (curPoz >= totalPoz && curPoz <= maxId) {
        docElem = document.getElementById(curPoz);
        docContent = docElem.textContent.replace(/\s+/g, ' ');
        
        if (docContent === input.charAt(inputLength - 1)) {
            docElem.classList.remove('incorrect', 'cursor');
            docElem.classList.add('correct');
            setCursor(curPoz + 1);
            testNextWord(inputLength);
            if (curPoz === maxId) {
                gameOver(false);
            }
        } else {
            docElem.classList.remove('correct', 'cursor');
            docElem.classList.add('incorrect');
            error = true;
            totalErrors++;
            document.getElementById('errors-value').textContent = totalErrors;
        }
        
    }

    if (inputLength < lastInputLength && !error) {
        clearCursor(curPoz + 2);
        setCursor(curPoz + 1);
    }else if (inputLength > lastInputLength){
        totalTypedChars++;
        calculateResults();
    }
    let progressPercentage = getRaceProgress(maxId,curPoz);
    console.log(progressPercentage, maxId, curPoz, );
    raceProgress.style.width = progressPercentage;
    raceProgress.innerHTML = progressPercentage;
    lastInputLength = inputLength;
}

function gameOver(timeEnd) {
    if (timeEnd){
        countdownValue.textContent = '0';
    }

    raceFinishedMessage.style.display = 'block';
    userInput.value = '';
    userInput.disabled = true;
    clearInterval(countdownInterval);
    calculateResults();


}




function calculateWpm(){
    const endTime = new Date().getTime();
    const timeElapsed = (endTime - startTime) / 1000; // in seconds
    return Math.round((totalTypedWords / timeElapsed) * 60);
}

function calculateAccuracy(){
    return (totalTypedChars > 0 ? ((totalTypedChars - totalErrors) / totalTypedChars) * 100 : 0).toFixed(2);
}

function getRaceProgress(maxPoz,cur){
    return Math.round(100/(maxPoz+1) * (cur+1))+"%";
}


function calculateResults() {
    document.getElementById('wpm-value').textContent = calculateWpm();
    document.getElementById('errors-value').textContent = totalErrors;
    document.getElementById('accuracy-value').textContent = calculateAccuracy() + '%';
    document.getElementById('total-words-typed-value').textContent = totalTypedChars;
}


startGame();


