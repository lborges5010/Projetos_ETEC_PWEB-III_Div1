<?php
//iusuario.php - serve para cadastrar um novo usuário
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$nome = $data['nome'];
$login = $data['login'];
$senha = $data['senha'];
$sql = "insert into usuarios (usunome, usulogin, ususenha) values (?,?,MD5(?));";
$prp = $pdo->prepare($sql);
$prp->execute([$nome,$login,$senha]);
Conexao::desconectar();
//{"nome":"valor","login":"valor","senha":"valor"}
//http://localhost/Projetos_ETEC_PWEB-III_Div1/api/iusuario.php?jsn={"nome":"JOÃO CARLOS DA SILVA","login":"JOCA","senha":"123456"}