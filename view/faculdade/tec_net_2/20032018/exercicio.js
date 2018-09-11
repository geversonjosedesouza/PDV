function calcular(){
    var primeiroNumero = document.getElementById('primeiroNumero');
    var segundoNumero = document.getElementById('segundoNumero');
    var operacoes = ["+","-","*","/","%"];
    for (i = 0; i < operacoes.length; i++) {
        var r = eval(primeiroNumero.value+operacoes[i]+segundoNumero.value);
        preencheTebela(primeiroNumero.value,operacoes[i],segundoNumero.value,r);
    }
}

function preencheTebela(col1,col2,col3,col4) {
    let tbody = document.getElementById('dados');
    let tr = document.createElement('tr');
    let td1 = document.createElement('td');
    let td2 = document.createElement('td');
    let td3 = document.createElement('td');
    let td4 = document.createElement('td');

    td1.innerHTML = col1;
    td2.innerHTML = col2;
    td3.innerHTML = col3;
    td4.innerHTML = col4;
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tbody.appendChild(tr);
}

function calcularNota(){
    var n1 = document.getElementById('nota1').value;
    var n2 = document.getElementById('nota2').value;
    var n3 = document.getElementById('nota3').value;
    var n4 = document.getElementById('nota4').value;
    var media = eval("("+n1+"+"+n2+"+"+n3+"+"+n4+")/4");
    if(media<6){
        avaliacaoFinal(media);
    }else{
        printResultado("Sua media é: " + media+" está aprovado");
    }
}

function avaliacaoFinal(avf){
   var tex = prompt("Nota da Avaliação Final", "digite a Nota da Avaliação Final");
   if (tex == null || tex == "") {
       printResultado("Usuário cancelou a nota da Avaliação Final e ficou com a média = "+avf+", por isso reprovado!");
    } else {
        var mediafinal = eval("("+tex+"+"+avf+")/2");
        if(mediafinal<6){
            printResultado("Sua media é: " + mediafinal+", por isso reprovado!");
        }else{
            printResultado("Sua media é: " + mediafinal+" está aprovado");
        }
    } 
}

function printResultado(r){
    document.getElementById("resultado").innerHTML = r;
}

function calcularSalario(){
    var salarioAtual = document.getElementById('salarioAtual').value;
    
   if(salarioAtual>0 && salarioAtual<=280){
       retornaInfomacoes(eval(salarioAtual+"*(20/100)"),salarioAtual,"20%");
   } else if(salarioAtual>280&&salarioAtual<700){
       retornaInfomacoes(eval(salarioAtual+"*(15/100)"),salarioAtual,"15%");
   } else if(salarioAtual>700&&salarioAtual<1500){
       retornaInfomacoes(eval(salarioAtual+"*(10/100)"),salarioAtual,"10%");
   } else if(salarioAtual>1500){
       retornaInfomacoes(eval(salarioAtual+"*(5/100)"),salarioAtual,"5%");
   }
}

function retornaInfomacoes(cal,salA,por){
    document.getElementById('salarioAntigo').value = salA;
    document.getElementById('porcentagem').value = por;
    document.getElementById('valorAumento').value = cal;
    document.getElementById('salarioNovo').value = eval(cal+"+"+salA);
}

function formatarData(){
    var dataDigitada = document.getElementById('data').value;
    var quebrandoString = dataDigitada.split("/");
    printResultado("Data informada é: "+quebrandoString[0]+" de "+retornaMes(parseInt(quebrandoString[1]))+" de "+quebrandoString[2]);
}

function retornaMes(numMes){
    var mes = 0;
   switch(numMes) {
    case 1:
        mes = "Janeiro";
        break;
    case 2:
        mes = "Fevereiro";
        break;
    case 3:
        mes = "Março";
        break;
    case 4:
        mes = "Abril";
        break;
    case 5:
        mes = "Maio";
        break;
    case 6:
        mes = "Junho";
        break;
    case 7:
        mes = "Julho";
        break;
    case 8:
        mes = "Agosto";
        break;
    case 9:
        mes = "Setembro";
        break;
    case 10:
        mes = "Outubro";
        break;
    case 11:
        mes = "Novembro";
        break;
    case 12:
        mes = "Dezembro";
        break;
    default:
        mes = "Mês Inexistente!";
}
return mes;
}

function formatar(objeto){
    var campo = document.getElementById('data');
    var valor = campo.value;
    var tamanho = valor.length;
    if(tamanho>1 && tamanho<3){
        campo.value += "/";
        //alert("ops!2");
    }else if(tamanho>4 && tamanho<6){
         campo.value += "/";
    }else if(tamanho>9 && tamanho<11){
         campo.setAttribute("disabled", "true"); 
    }
    }

function limpar(){
    var campo = document.getElementById('data');
    campo.value ="";
    campo.removeAttribute("disabled"); 
}