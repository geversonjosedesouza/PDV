var minhaFuncao1=()=>{
    var numeros = [1,3,5,7,9];
    var primeiro = numeros[0];
    var [a,b,c,d,e]= numeros;
}
var minhaFuncao2=()=>{
    var data = {
        cod: 1,
        nome: 'João da Silva',
        partido: 'pdt',
        analise:{
            votosValidos: 2000,
            votos: [
                {local: 'reg1', total: 10},
                {local: 'reg2', total: 100},
                {local: 'reg3', total: 35},
                {local: 'reg4', total: 356},
                {local: 'reg5', total: 1087},
                {local: 'reg6', total: 100},
                {local: 'reg7', total: 14},
                ]
        }
    };
    var {votos, votosValidos} = data.analise;
}
var minhaFuncao3=()=>{
    let x = 100;
    for(let i=0; i<10; i++){
        document.write(x*i+"<br />");
    }
    {
        document.write(i+"<br />");
    }
    {
    let y = 1000;
        document.write(y+"<br />");
    }
    document.write(y+"<br />");
}