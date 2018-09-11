var x = '';
function clicado(obj) {
    if (obj.value == 'c') {
        document.getElementById('display').value = '';
        x = '';
    } else if (obj.value != '=') {
        x += obj.value;
        document.getElementById('display').value = x;
    } else {
        document.getElementById('display').value = eval(x);   
    }
}