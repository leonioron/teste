<?php 
include("cabecalho.php");
include("conecta.php"); 

$nome = $_POST["nomeUsuario"];
$email = $_POST["emailUsuario"];
$telefone = $_POST["telefoneUsuario"];
?>

<h1>Edição de usuário</h1>

<div>
    <form id="form" action="usuario_editado.php" method="post">
        <table class="table">
            <tr>
                <td>Nome</td>
                <td><input class="form-control" type="text" name="nome" value="<?= $nome;?>" /></td>
                <td><input hidden class="form-control" type="text" name="nomeAntigo" value="<?= $nome;?>" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input class="form-control" onblur="validacaoEmail(email)" type="text" name="email" value="<?= $email;?>" />
                    <input hidden class="form-control" onblur="validacaoEmail(email)" type="text" name="emailAntigo" value="<?= $email;?>" />
                    <p id="msgemail" name="msgemail" value=" " ></p>
                </td>
            </tr>
            <tr>
                <td>Telefone</td>
                <td>
                    <input class="form-control" type="text" name="telefone" value="<?= $telefone;?>" />
                    <input hidden class="form-control" type="text" name="telefoneAntigo" value="<?= $telefone;?>" />
                    <p id="msgtelefone" name="msgtelefone" value=" " >
                </td>
            </tr>
            <tr>
                <td><input name="btnEditar" onclick="Validacao()" class="btn btn-primary" type="submit" value="Editar"/></td>
            </tr>
        </table>
    </form>
</div>

<script language="Javascript">
    function validacaoEmail(field) {
        usuario = field.value.substring(0, field.value.indexOf("@"));
        dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
        if ((usuario.length >=1) &&
        (dominio.length >=3) && 
        (usuario.search("@")==-1) && 
        (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) && 
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&      
        (dominio.indexOf(".") >=1)&& 
        (dominio.lastIndexOf(".") < dominio.length - 1)) {            
            var x = document.getElementById("msgemail");
            x.textContent = "Email válido";
            x.style.color = "green";
        }
        else{
            var x = document.getElementById("msgemail");
            x.textContent = "Email inválido";
            x.style.color = "red";
        }
    }
</script>

<script language="Javascript">
    function Validacao() {
        var email = document.getElementById("msgemail");
        if (email.textContent != "Email válido"){
            alert("erro");
            var form = document.getElementById("form");
            form.action = "principal.php";
        }   
    }
</script>

 <?php 
include("rodape.php");
include("desconecta.php"); 
?>