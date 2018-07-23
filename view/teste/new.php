<!-- 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
-->
<nav class="container">
    <h1>Teste Inserir</h1><hr>
    <div class="col-lg-12">

        <form action="?page=ControllerTeste&option=teste1" method="POST">
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Digite seu nome" class="form-control"  >
            <br>

            <label>Email: </label>
            <input type="text" name="email" placeholder="Digite seu email" class="form-control"  >
            <br>

            <label>Telefone: </label>
            <input type="text" name="telefone"  placeholder="Digite seu telefone" class="form-control"  >
            <br>
            <label>Descrição:</label>
            <textarea name="descricao" placeholder="Digite uma descrição" class="form-control"  ></textarea><br>
            <button class="btn btn-primary btn-lg btn-block">
                <span class="glyphicon glyphicon-ok-sign">Enviar</span>
            </button>
        </form><br>
    </div>