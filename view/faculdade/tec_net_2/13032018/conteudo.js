function testaAlerta(){
    alert('Isso é um alerta!');
    msg('Usuário confirmou alerta');
}
function testaPrompt(){
   var tex = prompt("Seu nome", "Usuário");
if (tex == null || tex == "") {
    msg("Usuário cancelou o prompt.");
} else {
    msg("Olá " + tex);
} 
}
function testaConfirma(){
    
    if (confirm("Pressione um botão!")) {
       msg("Você pressionou OK!");
    } else {
       msg("Você pressionou Cancel!");
    }
    
}
function msg(t){
    document.getElementById("demo").innerHTML = t;
}