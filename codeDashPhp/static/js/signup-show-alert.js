document.addEventListener('DOMContentLoaded', function () {
    const params = new URLSearchParams(window.location.search);

    if (params.has('signupSuccess') && params.get('signupSuccess') === 'true') {
        showSuccessAlert();
    }

    function showSuccessAlert() {
        var successAlert = document.getElementById('customAlert');
        successAlert.classList.remove('d-none')
        successAlert.classList.add('d-block');
        setTimeout(function () {
            successAlert.classList.remove('d-block');
            successAlert.classList.add('d-none');
            history.replaceState(null, null, window.location.pathname);
        }, 5000);
    }
});

function hideAlert(){
    var successAlert = document.getElementById('customAlert');
    successAlert.classList.remove('d-block');
    successAlert.classList.add('d-none');
    history.replaceState(null, null, window.location.pathname);
}