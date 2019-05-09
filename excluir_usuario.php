<?php 
include("cabecalho.php");
include("conecta.php");
include("operacoes_banco.php"); 

$nome = $_POST["nomeUsuario"];
$email = $_POST["emailUsuario"];
$telefone = $_POST["telefoneUsuario"];
$resultadoDaExclusao = excluiUsuario($conexao, $nome, $email, $telefone);

?>

<?php
if($resultadoDaExclusao) {
?>
    <form action="principal.php">
        <table class="table">
            <tr>
                <td><p class="text-success">Usuário excluído com sucesso</p></td>
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
            <td><p class="text-danger">Usuário não cadastrado</p></td>
        </tr>
    </table>
<?php
}
?>


<?php 
include("rodape.php"); 
include("desconecta.php"); 
?>