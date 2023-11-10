<?php

require_once("../conexao.php"); 

$id = $_POST['idDeletLink'];

$pdo->query("DELETE from links WHERE id = '$id'");

echo 'Excluído com Sucesso!!';

?>