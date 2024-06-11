// sweetAlert.js
function showAlert(message, type) {
    Swal.fire({
        title: type === 'success' ? 'Éxito' : 'Error',
        text: message,
        icon: type,
        confirmButtonText: 'OK'
    });
}

document.addEventListener("DOMContentLoaded", function() {
    const params = new URLSearchParams(window.location.search);
    if (params.has('message')) {
        const message = params.get('message');
        const type = params.get('type');
        showAlert(message, type);
    }
});
