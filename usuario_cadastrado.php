<?php 
include("cabecalho.php");
include("conecta.php");
include("operacoes_banco.php"); 

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$resultadoDaInsercao = insereUsuario($conexao, $nome, $email, $telefone);

?>

<?php
if($resultadoDaInsercao) {
?>
    <form action="principal.php">
        <table class="table">
            <tr>
                <td><p class="text-success">Usuário cadastrado com sucesso</p></td>
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
        <tr>
            <td><p><b>Possíveis motivos para o cadastro do usuário não ter ocorrido:</b></p></td>
        </tr>
        <tr>
            <td><p>- O usuário já existe;</p></td>
        </tr>
        <tr>
            <td><p>- Falha de conexão ao banco de dados (neste caso aconselhamos tentar novamente mais tarde).</p></td>
        </tr>
    </table>
<?php
}
?>


<?php 
include("rodape.php"); 
include("desconecta.php"); 
?>