<?php 
include("conecta.php");
include("operacoes_banco.php"); 
include("cabecalho.php"); 


$usuarios = listaUsuarios($conexao);
?>

<br><h3>Lista de usuários</h3><br>

<table class="table table-striped table-bordered"> 
    <tr>
        <td><p>Nome</p></td>
        <td><p>Email</p></td>
        <td><p>Telefone</p></td>
        <td><p>Editar ?</p></td>
        <td><p>Excluir</p></td>
    </tr>
    <?php
    foreach($usuarios as $usuario) {
    ?>
    
        <tr>
        <td><?= $usuario['nome'] ?></td>
        <td><?= $usuario['email'] ?></td>
        <td><?= $usuario['telefone'] ?></td>
        <form  action="editar_usuario.php" method="post">
            <td>
                <input class="btn btn-primary" type="submit" value="Editar?" />
                <input hidden class="form-control" type="text" name="nomeUsuario" value="<?= $usuario['nome'];?>" />
                <input hidden class="form-control" type="text" name="emailUsuario" value="<?= $usuario['email'];?>" />
                <input hidden class="form-control" type="text" name="telefoneUsuario" value="<?= $usuario['telefone'];?>" />
            </td>
        </form>
        <form  action="excluir_usuario.php" method="post">
            <td>
                <input class="btn btn-primary" type="submit" value="Excluir?" />
                <input hidden class="form-control" type="text" name="nomeUsuario" value="<?= $usuario['nome'];?>" />
                <input hidden class="form-control" type="text" name="emailUsuario" value="<?= $usuario['email'];?>" />
                <input hidden class="form-control" type="text" name="telefoneUsuario" value="<?= $usuario['telefone'];?>" />
            </td>
        </form>
        </tr>
 
    <?php
    }
    ?>
    
</table> 


<br><h3>Deseja adicionar um cliente na lista?</h3><br>

<form method="POST" action="cadastrar_usuario.php" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <td><input type="submit" class="btn btn-primary" name="submit_image" value="Adicionar"></td>
            <td><input hidden class="form-control" type="text" name="id" value="<?= $idlogado;?>" /></td>
        </tr>
    </table>
</form>


<?php 
include("desconecta.php");
include("rodape.php"); 
?>