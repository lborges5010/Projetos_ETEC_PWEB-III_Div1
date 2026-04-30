<?php
//spusuarios.php - serve para listar os dados
require '../../app/conexao.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$json = filter_input(INPUT_GET,'jsn');
$data = json_decode($json,true);
$nome = '%'.$data['nome'].'%';
$sql = "
select 
usuid as id, 
usunome as nome, 
usulogin as usuario, 
usulogado as logado 
from usuarios 
where usunome like ?;
";
$prp = $pdo->prepare($sql);
$prp->execute([$nome]);
$data = $prp->fetchall(PDO::FETCH_ASSOC);
echo json_encode($data);
Conexao::desconectar();
//{"nome":"valor"}
/*
http://localhost/Projetos_ETEC_PWEB-III_Div1/api/spusuarios.php?jsn={"nome":"Ricardo"}
                    {"nome":"' or '1' = '1';--"}
*/