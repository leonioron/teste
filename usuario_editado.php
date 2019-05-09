<?php 
include("cabecalho.php");
include("conecta.php");
include("operacoes_banco.php"); 

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$nomeAntigo = $_POST["nomeAntigo"];
$emailAntigo = $_POST["emailAntigo"];
$telefoneAntigo = $_POST["telefoneAntigo"];
$resultadoDaEdicao = editaUsuario($conexao, $nome, $email, $telefone, $nomeAntigo, $emailAntigo, $telefoneAntigo);
//var_dump($nome);
//die();
?>

<?php
if($resultadoDaEdicao) {
?>
    <form action="principal.php">
        <table class="table">
            <tr>
                <td><p class="text-success">Usuário editado com sucesso</p></td>
            </tr>
            <tr>
                <td><input class="btn btn-primary" type="submit" value="OK" /></td>
            </tr>
        </table>
    </form>
<?php
} else {
?>
    <table class="table">
        <tr>
            <td><p class="text-danger">Usuário não editado</p></td>
        </tr>
    </table>
<?php
}
?>


<?php 
include("rodape.php"); 
include("desconecta.php"); 
?>