<?php


/// -------------- USUARIOS ---------------------------------------------------
function listaUsuarios($conexao) {
    $usuarios = array();
    $resultadoArquivos = mysqli_query($conexao, "select * from usuarios");
    while($usuario = mysqli_fetch_assoc($resultadoArquivos)) {
        array_push($usuarios, $usuario);
    }
    return $usuarios;
}

function buscaUsuario($conexao, $email,  $telefone) {
    $resultado = mysqli_query($conexao, "select * from usuarios where email = '{$email}'");
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}


function insereUsuario($conexao, $nome, $email, $telefone) {
    //1° - verificamos se o usuario ja existe
    $usuario = buscaUsuario($conexao, $email,  $telefone);
    if ($usuario['email'] != "")
        return false;
    
    //caso o usuario ainda não possua cadastro, insere.
    $query = "insert into usuarios (nome, email, telefone) values ('{$nome}', '{$email}', '{$telefone}')";
    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function excluiUsuario($conexao, $nome, $email, $telefone){
    $query = "delete from usuarios where nome = '{$nome}' and email = '{$email}' and telefone = '{$telefone}'";
    $resultado = mysqli_query($conexao, $query);
    return $resultado;
}

function editaUsuario($conexao, $nome, $email, $telefone, $nomeAntigo, $emailAntigo, $telefoneAntigo){
    $query = "update usuarios set nome = '{$nome}', email = '{$email}', telefone = '{$telefone}' where nome = '{$nomeAntigo}' and email = '{$emailAntigo}' and telefone = '{$telefoneAntigo}'";
    $resultado = mysqli_query($conexao, $query);
    return $resultado;
}
/// -------------- USUARIOS ---------------------------------------------------



