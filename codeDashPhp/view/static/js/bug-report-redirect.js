let seconds = 5;

function countdown() {
    document.getElementById('timer').innerText = seconds;
    if (seconds === 0) {
        window.location.href = "index.php";
    } else {
        seconds--;
        setTimeout(countdown, 1000);
    }
}

countdown();