const msgExito = document.getElementById('msgExito');
const msgError = document.getElementById('msgError');

if (msgExito.children.length > 0) {
    setTimeout(() => {
        msgExito.children[0].remove();
    }, 2000);
} else if (msgError.children.length > 0) {
    setTimeout(() => {
        msgError.children[0].remove();
    }, 2000);
}
