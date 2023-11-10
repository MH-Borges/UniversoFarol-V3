<?php
@session_start();
require_once("../conexao.php"); 

$idEdit = $_POST['idEdit'];
$NomeLink = $_POST['nomeLink'];
$Link = $_POST['link'];
$LinkAtivo = isset($_POST['linkAtivo']) ? 'sim' : 'nao';


// ===== VERIFICAÇÃO DE INPUTS VAZIOS =====
if($NomeLink == ""){
	echo 'Preencha o Campo Nome do Link!';
	exit();
}

if($Link == ""){
	echo 'Preencha o Campo de Link!';
	exit();
}

if($idEdit == ""){
    $res = $pdo->query("SELECT * FROM links where nome = '$NomeLink'"); 
    $dados = $res->fetchAll(PDO::FETCH_ASSOC);
    if(@count($dados) != 0){
        echo 'Link já Cadastrado no Banco de dados!';
        exit();
    }
}

if($Link !== "" && $Link !== null){
    if($Link[0] == 'h' && $Link[1] == 't' && $Link[2] == 't' && $Link[4] == 's' ){
        $Link = ltrim($Link, 'https://');
    }
    
    if($Link[0] == 'h' && $Link[1] == 't' && $Link[2] == 't' && $Link[4] == ':' ){
        $Link = ltrim($Link, 'http://');
    }
}


// ===== SCRIPTS PARA SUBIR BANNER E IMG PERFIL PARA O BANCO =====

//BANNER
$nomeImgBanner = preg_replace('/[ -]+/' , '-' , @$_FILES['BannerEdit']['name']);
$caminhoBanner = '../../assets/Banner_Links/' .$nomeImgBanner;

if (@$_FILES['BannerEdit']['name'] == ""){ $Banner = "Banner.png"; }
else{ $Banner = $nomeImgBanner; }

$BannerImgTemp = @$_FILES['BannerEdit']['tmp_name']; 
$extBanner = pathinfo($Banner, PATHINFO_EXTENSION);

if($extBanner == 'png' or $extBanner == 'jpg' or $extBanner == 'jpeg' or $extBanner == 'webp'){ 
    move_uploaded_file($BannerImgTemp, $caminhoBanner);
}
else{
    echo 'Extensão da imagem do banner não permitida!';
    exit();
}


// ===== INSERÇÃO DE DADOS NO BANCO =====

if($idEdit == ""){
    $res = $pdo->prepare("INSERT INTO links (img, nome, link, ativo) VALUES (:img, :nome, :link, :ativo)");
    $res->bindValue(":img", $Banner);
}
else{
    if($Banner == "Banner.png"){
        $res = $pdo->prepare("UPDATE links SET nome = :nome, link = :link, ativo = :ativo WHERE id = :id");
    }
    else{
        $res = $pdo->prepare("UPDATE links SET img = :img, nome = :nome, link = :link, ativo = :ativo WHERE id = :id");
        $res->bindValue(":img", $Banner);
    }
    $res->bindValue(":id", $idEdit);
}

$res->bindValue(":nome", $NomeLink);
$res->bindValue(":link", $Link);
$res->bindValue(":ativo", $LinkAtivo);
$res->execute();


echo 'Salvo com Sucesso!!';
    

?>