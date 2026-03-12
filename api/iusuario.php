<?php
require '../app/conexao.php';

$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Recebe o JSON
$json = filter_input(INPUT_GET, 'jsn');
$data = json_decode($json, true);

// Dados recebidos
$nome = $data['nome'];
$login = $data['login'];
$senha = $data['senha'];

// SQL de inserção
$sql = "INSERT INTO usuarios (usunome, usulogin, ususenha) 
        VALUES (:nome, :login, :senha)";

$prp = $pdo->prepare($sql);

$prp->bindParam(':nome', $nome);
$prp->bindParam(':login', $login);
$prp->bindParam(':senha', $senha);

$prp->execute();

// Retorno em JSON
echo json_encode([
    "status" => "logado",
    "mensagem" => "Usuario inserido com sucesso"
]);
?>