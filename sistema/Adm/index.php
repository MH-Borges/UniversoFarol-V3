<?php
session_start();
require_once("../configs/conexao.php");

$emailUserSessao = @$_SESSION['email_user'];
    
$query = $pdo->query("SELECT * FROM usuarios WHERE email = '$emailUserSessao' LIMIT 1");
$dados = $query->fetchAll(PDO::FETCH_ASSOC);

if(@count($dados) > 0){
    $idAdm = $dados[0]['id'];
    $nomeCompAdm = $dados[0]['nome_Completo'];
    $emailAdm = $dados[0]['email'];
    $telefoneContAdm = $dados[0]['telefone'];
    $senhaAdm = $dados[0]['senha'];
    $dataRegistroAdm = $dados[0]['data_Registro'];
    
    setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
    $date = strftime(" %B de %Y", strtotime($dataRegistroAdm));
} 
else {
    $_SESSION['msg_perfilInvalido'] = "<div class='msgPerfilInvalido' style='left: 1.5vw !important; background:#CC101D;'>Usuario não encontrado!</div>";
    header("Location: ../../links.php");
}

?> 


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universo Farol | Administrativo</title>
    <link rel="icon" href="../../assets/icon_Logo.png" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Mask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>


    <!-- Main files -->
    <link rel="stylesheet" href="../../css/style.css">

    <script defer src="js/script.js"></script>
    <script src="../../js/svg-inject.min.js"></script>
</head>

<body class="TelaAdm">

    <div class="Background">
        <img class="Padrao" src="../../assets/Padronagem.png">
    </div>

    <header class="admHeader">
        <div class="Infos">
            <a href="../../links.php" class="InfosImg">
                <img src="../../assets/NH_Logo.png">
            </a>
            <div class="nomeTagAdm">
                <p class="nomeAdm"><?php echo $nomeCompAdm; ?></p>
                <span class="TagAdm">Painel Administrativo</span>
            </div>
        </div>
        <button type="button" data-toggle="modal" data-target="#ModalEditPerfil">
            <img src="../../assets/icones/engrenagem.svg" onload="SVGInject(this)">
        </button>
        <button type="button" data-toggle="modal" data-target="#ModalLogout">
            <img src="../../assets/icones/sair.svg" onload="SVGInject(this)">
        </button>
    </header>

    <main class="AdmBlock">
        <div class="addNewLink">
            <a href='index.php?funcao=novo'>
                <img src="../../assets/icones/Close.svg" onload="SVGInject(this)">
                <span>Adicionar novo link</span>
            </a>
        </div>

        <div class="linksBlock">
            <div class="linksAtivos">
                <h2>Links Ativos</h2>
                <div class="links">
                    <?php
                        $query = $pdo->query("SELECT * FROM links where ativo = 'sim' ORDER BY id ASC");
                        $dados = $query->fetchAll(PDO::FETCH_ASSOC);
                        for ($i=0; $i < count($dados); $i++) {
                            $id_Banner = $dados[$i]['id'];
                            $img_Banner = $dados[$i]['img'];
                            $nome_Banner = $dados[$i]['nome'];
                            $link_Banner = $dados[$i]['link'];
                            echo "
                                <div class='BannerLink'>
                                    <a target='_blank' class='banner' href='https://$link_Banner'>
                                        <h3> $nome_Banner </h3>
                                        <img src='../../assets/Banner_Links/$img_Banner'>
                                    </a>
                    
                                    <a id='EditLink' href='index.php?funcao=editar&id=$id_Banner'>Editar</a>
                                    <a id='DeletLink' href='index.php?funcao=excluir&id=$id_Banner'>Excluir</a>
                                </div>
                            ";
                        }
                    ?>
                </div>
            </div>
    
            <div class="LinkDesativados">
                <h2>Links Desativados</h2>
                <div class="links">
                    <?php
                        $query = $pdo->query("SELECT * FROM links where ativo = 'nao' ORDER BY id ASC");
                        $dados = $query->fetchAll(PDO::FETCH_ASSOC);
                        for ($i=0; $i < count($dados); $i++) {
                            $id_Banner = $dados[$i]['id'];
                            $img_Banner = $dados[$i]['img'];
                            $nome_Banner = $dados[$i]['nome'];
                            $link_Banner = $dados[$i]['link'];
                            $link_img = '../../assets/Banner_Links/' . $img_Banner;
                            echo "
                                <div class='BannerLink'>
                                    <a target='_blank' class='banner' href='https://$link_Banner'>
                                        <h3> $nome_Banner </h3>
                                        <img src='../../assets/Banner_Links/$img_Banner'>
                                    </a>
                    
                                    <a id='EditLink' href='index.php?funcao=editar&id=$id_Banner'>Editar</a>
                                    <a id='DeletLink' href='index.php?funcao=excluir&id=$id_Banner'>Excluir</a>
                                </div>
                            ";
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Logout-->
    <div class="modal fade" id="ModalLogout" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ModalLogout">
            <div class="modal-content">
                <button type="button" class="CloseBtn" data-dismiss="modal" aria-label="Close">
                    <img src="../../assets/icones/Close.svg" onload="SVGInject(this)">
                </button>
                <div class="modal-body">
                    <h5>Já vai embora?</h5>
                    <h6>Tem certeza que gostaria de sair da sa conta?</h6>
                </div>
                <div class="modal-footer">
                    <button class="CancelaBtnModal" type="button" data-dismiss="modal">Cancelar</button>
                    <a href="../configs/logout.php" class="LogoutBtnModal" type="button">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar perfil-->
    <div class="modal fade" id="ModalEditPerfil" data-backdrop="static" data-keyboard="false" tabindex="-1"     
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ModalEditPerfil">
            <div class="modal-content">
                <button type="button" class="CloseBtn" data-dismiss="modal" aria-label="Close">
                    <img src="../../assets/icones/Close.svg" onload="SVGInject(this)">
                </button>
                <div class="modal-body">
                    <div id="MenuAdm" class="nav nav-pills MenuAdm">
                        <a class="active" data-toggle="pill" id="InicioTab" href="#ContaDados">Dados da conta</a>
                        <a data-toggle="pill" id="GraficosTab" href="#EmailTroca">Troca de email</a>
                        <a data-toggle="pill" id="AstronautasTab" href="#SenhaTroca">Troca de senha</a>
                    </div>
                    <div id="TabsAdm" class="tab-content TabsAdm">
                        <div class="tab-pane fade show active" id="ContaDados">
                            <form id="formEditUser" class="editDados" method="POST">
                                <h4>Alterar informações de conta:</h4>
                                <div class="BlockBox">
                                    <input type="text" name="nomeCompEdit" id="nomeCompEdit" maxlength="75" value="<?php echo $nomeCompAdm ?>" required>
                                    <span>Nome completo:</span>
                                    <p class="lengthInput NomeCompEditInput"></p>
                                </div>
                                <div class="BlockBox">
                                    <input type="text" name="telefoneContatoEdit" id="telefoneContatoEdit" value="<?php echo $telefoneContAdm ?>" required>
                                    <span>Telefone de contato:</span>
                                </div>
                                <input value="<?php echo @$_SESSION['id_user'] ?>" class="hide" type="hidden" name="idUser" id="idUser">
                                <button class="SalvarBtnModal" id="SalvarEditUser" type="submit">Salvar</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="EmailTroca">
                            <form id="formEditEmailUser" class="emailEdit" method="POST">
                                <h4>Alterar Email:</h4>

                                <div class="BlockBox">
                                    <input type="text" name="antigoEmail" id="antigoEmail" maxlength="50" required>
                                    <span>E-mail Antigo:</span>
                                    <p class="lengthInput emailAntigoEditInput"></p>
                                </div>
                                <div class="BlockBox">
                                    <input type="text" name="novoEmail" id="novoEmail" maxlength="50" required>
                                    <span>Novo e-mail:</span>
                                    <p class="lengthInput novoEmailEditInput"></p>
                                </div>
                                <div class="BlockBox">
                                    <input type="text" name="confirmaNovoEmail" id="confirmaNovoEmail" maxlength="50" required>
                                    <span>Confirma novo e-mail:</span>
                                    <p class="lengthInput ConfirmaNovoEmailEditInput"></p>
                                </div>
                                
                                <input value="<?php echo @$_SESSION['id_user'] ?>" class="hide" type="hidden" name="idUserEmail" id="idUserEmail">
                                <input value="<?php echo $emailAdm ?>" class="hide" type="hidden" name="emailUserSemAlteracoes" id="emailUserSemAlteracoes">

                                <button class="SalvarBtnModal" id="SalvarEditEmailUser" type="submit">Salvar</button>
                            </form>

                        </div>
                        <div class="tab-pane fade" id="SenhaTroca">
                            <form id="formEditSenhaUser" class="senhaEdit" method="POST">
                                <h4>Alterar Senha:</h4>

                                <div class="BlockBox senhaInput">
                                    <input type="password" name="antigaSenha" id="antigaSenha" maxlength="25" required>
                                    <span>Senha antiga:</span>
                                    <i id="password_toggle" onclick="passwordToggle()" class="senhaIcon fa fa-eye-slash"></i>
                                    <p class="lengthInput SenhaAntigaEditInput"></p>
                                </div>
                                <div class="BlockBox senhaInput">
                                    <input type="password" name="novaSenha" id="novaSenha" maxlength="25" required>
                                    <span>Nova senha:</span>
                                    <i id="password_toggle_new" onclick="passwordToggleNew()" class="senhaIcon fa fa-eye-slash"></i>
                                    <p class="lengthInput NovaSenhaEditInput"></p>
                                </div>
                                <div class="BlockBox senhaInput">
                                    <input type="password" name="confirmaNovaSenha" id="confirmaNovaSenha" maxlength="25" required>
                                    <span>Confirma nova senha:</span>
                                    <i id="password_toggle_confirm" onclick="passwordToggleConfirm()" class="senhaIcon fa fa-eye-slash"></i>
                                    <p class="lengthInput ConfirmaNovaSenhaEditInput"></p>
                                </div>

                                <input value="<?php echo @$_SESSION['id_user'] ?>" class="hide" type="hidden" name="idUserSenha" id="idUserSenha">
                                <input value="<?php echo $senhaAdm ?>" class="hide" type="hidden" name="senhaUserSemAlteracoes" id="senhaUserSemAlteracoes">

                                <button class="SalvarBtnModal" id="SalvarEditSenhaUser" type="submit">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="msgErros"></div>
            </div>
        </div>
    </div>

    <!-- Modal de Dados-->
    <div class="modal fade" id="ModalDados" data-backdrop="static" data-keyboard="false" tabindex="-1"     
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ModalDados">
            <div class="modal-content">
                <button type="button" class="CloseBtn" onclick="resetIndex()" data-dismiss="modal" aria-label="Close">
                    <img src="../../assets/icones/Close.svg" onload="SVGInject(this)">
                </button>
                <div class="modal-body">
                    <?php 
                        if (@$_GET['funcao'] == 'editar') {
                            $titulo = "Edição de banner de link";
                            $btn = "Atualizar";

                            $id_Banner = $_GET['id'];

                            $query = $pdo->query("SELECT * FROM links WHERE id = '$id_Banner' LIMIT 1");
                            $dados = $query->fetchAll(PDO::FETCH_ASSOC);

                            if(@count($dados) > 0){
                                $img = $dados[0]['img'];
                                $nome = $dados[0]['nome'];
                                $link = $dados[0]['link'];
                                $ativo = $dados[0]['ativo'];
                            }

                        } else { $titulo = "Novo Link"; $btn = "Salvar";}

                    ?>
                    <form id="FormDados" method="POST">
                        <h4><?php echo $titulo ?></h4>

                        <div class="bannerImgEdit">
                            <input type="file" value="<?php echo @$img ?>" id="BannerEdit" name="BannerEdit" onChange="carregarImgBanner();">
                            <?php
                                if(@$img != ""){
                                    echo "<img class='BannerIcon imgBannerFull' id='targetBanner' src='../../assets/Banner_Links/$img'>";
                                }else{
                                    echo "<img class='BannerIcon' id='targetBanner' src='../../assets/icones/bannerIcon.svg'>";
                                }
                            ?>
                            <img class="editPen" onclick="EditBanner()" src="../../assets/icones/caneta.svg" onload="SVGInject(this)">
                            <span>Tamanho de banner recomendado: 800 x 250</span>
                        </div>

                        <div class="BlockBox">
                            <input type="text" value="<?php echo @$nome ?>" name="nomeLink" id="nomeLink" maxlength="50" required>
                            <span>Nome do Link:</span>
                            <p class="lengthInput nomeLinkInput"></p>
                        </div>
                        <div class="BlockBox">
                            <input type="text" value="<?php echo @$link ?>" name="link" id="link" maxlength="250" required>
                            <span>Link:</span>
                            <p class="lengthInput linkInput"></p>
                        </div>
                        <div class="checkBoxLinkAtivo">
                            <label for="linkAtivo">É um link Ativo?</label>
                            <?php
                                if(@$ativo != ""){
                                    if(@$ativo == "sim"){
                                        echo "<input type='checkbox' id='linkAtivo' name='linkAtivo' checked>";
                                    }
                                    else{
                                        echo "<input type='checkbox' id='linkAtivo' name='linkAtivo'>";
                                    }
                                }else{
                                    echo "<input type='checkbox' id='linkAtivo' name='linkAtivo' checked>";

                                }
                            ?>
                        </div>
                        <input type="hidden" id="idEdit" name="idEdit" value="<?php echo @$_GET['id'] ?>" required>
                        <button class="SalvarBtnModal" id="SalvarNovoLink" type="submit"><?php echo $btn ?></button>
                    </form> 
                </div>
                <div class="msgErros"></div>
            </div>
        </div>
    </div>

    <!-- Modal Delet Link-->
    <div class="modal fade" id="ModalDeletLink" data-backdrop="static" data-keyboard="false" tabindex="-1"     
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ModalDeletLink">
            <div class="modal-content">
                <button type="button" class="CloseBtn" onclick="resetIndex()" data-dismiss="modal" aria-label="Close">
                    <img src="../../assets/icones/Close.svg" onload="SVGInject(this)">
                </button>
                <div class="modal-body">
                   
                    <form id="formDeletLink" method="POST">
                        <h4>Excluir Link</h4>

                        <h5>Tem certeza que gostaria de excluir esse link?</h5>
                        <?php $id_Banner = $_GET['id']; ?>
                        
                        <input type="hidden" id="idDeletLink" name="idDeletLink" value="<?php echo $id_Banner ?>" required>

                        <button class="CancelarBtnModal" id="CancelarDeletLink" type="button">Cancelar</button>
                        <button class="DeletBtnModal" id="DeletLinkbtn" type="button">Excluir</button>
                    </form> 
                </div>
                <div class="msgErrosDelet"></div>
            </div>
        </div>
    </div>


    
<?php 

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "novo") {
    echo "<script language='javascript'> $('#ModalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "editar") {
    echo "<script language='javascript'> $('#ModalDados').modal('show');</script>";
}

if (@$_GET["funcao"] != null && @$_GET["funcao"] == "excluir") {
    echo "<script language='javascript'> $('#ModalDeletLink').modal('show');</script>";
}

?>

</body>
</html>


