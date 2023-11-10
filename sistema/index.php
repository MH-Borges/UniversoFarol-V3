
<?php
@session_start();
@ob_start();
require_once("conexao.php");

//VERIFICAR SE EXISTE ALGUM CADASTRO NO BANCO, SE NÃO TIVER CADASTRAR O USUÁRIO ADMINISTRADOR
$res = $pdo->query("SELECT * FROM usuarios");
$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$senha_cripM = md5('Matheus123@');
$senha_cripJ = md5('Julia123@');
$data = date('Y/m/d H:i:s');

if(@count($dados) == 0){
    $res = $pdo->query("INSERT into usuarios (nome_Completo, nivel, email, senha, senha_Crip, data_Registro) values ('Matheus ADM', 'adm', 'MatheusAdm@universofarol.com.br', 'Matheus123@', '$senha_cripM', '$data' )");
    $res = $pdo->query("INSERT into usuarios (nome_Completo, nivel, email, senha, senha_Crip, data_Registro) values ('Julia ADM', 'adm', 'JuliaAdm@universofarol.com.br', 'Julia123@', '$senha_cripJ', '$data' )");
}

if(@$_SESSION['id_user'] != null && @$_SESSION['nivel_user'] == 'adm'){
    echo "<script> window.location='./adm'</script>";
}

?> 


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NH inteligencia empresarial | Login</title>
    <link rel="icon" href="../assets/NH_Logo.png" />

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
    <link rel="stylesheet" href="../css/style.css">

    <script defer src="js/script.js"></script>

    <script src="../js/svg-inject.min.js"></script>
</head>

<body class="Login">

    <div class="Background">
        <img class="Padrao" src="../assets/Padronagem.png">
    </div>

    <?php
        if (isset($_SESSION['msg_rec'])) {
            echo $_SESSION['msg_rec'];
            unset($_SESSION['msg_rec']);
        }
    ?>

    <main>
        <section class="login_sreen">
            <form class="LoginBox" action="autenticar.php" method="post" name="login">
                <h2>Login NH</h2>

                <div class="BlockBox">
                    <input type="text" name="emailLogin" id="emailLogin" required>
                    <span>E-mail:</span>
                </div>

                <div class="BlockBox senhaInput">
                    <input type="password" name="senhaLogin" id="senhaLogin" required>
                    <span>Senha:</span>
                    <i id="password_toggle" onclick="passwordToggle()" class="senhaIcon fa fa-eye-slash"></i>
                </div>

                <button type="submit" id="loginBt">Conectar</button>

                <button type="button" class="senhaRecoverBtn" data-toggle="modal" data-target="#ModalRecoverSenha">
                    Esqueceu a senha?
                </button>

            </form>
        </section>
    </main>
    
    <div class="mensagemLogin"></div>

    <!-- Modal recupera senha-->
    <div class="modal fade" id="ModalRecoverSenha" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog ModalRecoverSenha">
            <form class="modal-content">

                <button type="button" class="CloseBtn" data-dismiss="modal" aria-label="Close">
                    <img src="../assets/icones/Close.svg" onload="SVGInject(this)">
                </button>

                <div class="modal-body">
                    <h5>Por favor, insira o e-mail que foi cadastrado</h5>
                    <div class="BlockBox">
                        <input type="text" name="emailRecuperaSenha" id="emailRecuperaSenha" maxlength="50" required>
                        <span>Email para recuperação de senha:</span>
                        <p class="lengthInput EmailResetSenhaInput"></p>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="CancelaBtnModal" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="SalvarBtnModal RecuperarSenha" type="button">Recuperar senha</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>