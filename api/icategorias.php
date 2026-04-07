<?php
//icategorias.php - serve para cadastrar um novo usuário
require '../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$nome = $data['nome'];
$sql = "insert into categorias (catnome) values (?);";
$prp = $pdo->prepare($sql);
$prp->execute([$nome]);
Conexao::desconectar();

//http://localhost/Projetos_ETEC_PWEB-III_Div1/api/icategorias.php?jsn={%22nome%22:%22Lanches%22}