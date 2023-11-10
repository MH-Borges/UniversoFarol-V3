$(document).ready(function () {
    $('.RecuperarSenha').click(function(event){
        event.preventDefault();
        $.ajax({
            url:"recuperar.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                if(msg.trim() === 'Link para a recuperação de senha enviado para o e-mail informado!'){
                    $('.CloseBtn').click();
                    $('.mensagemLogin').css('bottom', '2vh');
                    $('.mensagemLogin').css('background', '#048319');
                    $('.mensagemLogin').text(msg);
                    setTimeout(() => {
                        $('.mensagemLogin').css('bottom', '-12vw');
                        setTimeout(() => { 
                            $('.mensagemLogin').text(' ');
                            $('.mensagemLogin').css('background', 'none');
                        }, 1000);
                    }, 3000);
                    setTimeout(() => { window.location.reload(); }, 2000);
                }else if(msg.trim () === 'Preencha o campo de recuperação de e-mail!'){
                    $('.mensagemLogin').css('bottom', '2vh');
                    $('.mensagemLogin').css('background', '#CC101D');
                    $('.mensagemLogin').text(msg);
                    setTimeout(() => { 
                        $('.mensagemLogin').css('bottom', '-12vw');
                        setTimeout(() => { 
                            $('.mensagemLogin').text(' ');
                            $('.mensagemLogin').css('background', 'none');
                        }, 1000);
                    }, 4000);

                }else if(msg.trim() === 'Este e-mail não está cadastrado!'){
                    $('.mensagemLogin').css('bottom', '2vh');
                    $('.mensagemLogin').css('background', '#CC101D');
                    $('.mensagemLogin').text(msg);
                    setTimeout(() => { 
                        $('.mensagemLogin').css('bottom', '-12vw');
                        setTimeout(() => { 
                            $('.mensagemLogin').text(' ');
                            $('.mensagemLogin').css('background', 'none');
                        }, 1000);
                    }, 4000);
                }else{
                    $('.CloseBtn').click();
                    $('.mensagemLogin').css('bottom', '2vh');
                    $('.mensagemLogin').css('background', '#CC101D');
                    $('.mensagemLogin').text('Erro ao Enviar o Formulário! Possiveis falhas ao se conectar ao servidor de hospedagem.');
                    setTimeout(() => { 
                        $('.mensagemLogin').css('bottom', '-12vw');
                        setTimeout(() => { 
                            $('.mensagemLogin').text('');
                            $('.mensagemLogin').css('background', 'none');
                        }, 1000);
                    }, 6000);
                }
            }
        })
    });
});

if(document.querySelector('#senhaLogin') != null){
    var password = document.getElementById("senhaLogin");
    var password_eye = document.getElementById("password_toggle");

    function passwordToggle() {
        if (password.type === 'password') {
            password.type = 'text';
            password_eye.classList.remove('fa-eye-slash');
            password_eye.classList.add('fa-eye');
        } else {
            password.type = 'password';
            password_eye.classList.remove('fa-eye');
            password_eye.classList.add('fa-eye-slash');
        }
    }

}

if(document.querySelector('#novaSenhaUser') != null){
    var passwordNew = document.getElementById("novaSenhaUser");
    var password_eye = document.getElementById("password_toggle");
    function passwordToggle() {
        if (passwordNew.type === 'password') {
            passwordNew.type = 'text';
            password_eye.classList.remove('fa-eye-slash');
            password_eye.classList.add('fa-eye');
            password_eye.style.opacity = "1";
            password_eye.style.marginRight = "1vw";
        } else {
            passwordNew.type = 'password';
            password_eye.classList.remove('fa-eye');
            password_eye.classList.add('fa-eye-slash');
            password_eye.style.opacity = "0";
            password_eye.style.marginRight = "0";
        }
    }

}

if(document.querySelector('#repetNovaSenhaUser') != null){
    var passwordAgain = document.getElementById("repetNovaSenhaUser");
    var password_eye_again = document.getElementById("password_toggle_again");
    function passwordToggleNew() {
        if (passwordAgain.type === 'password') {
            passwordAgain.type = 'text';
            password_eye_again.classList.remove('fa-eye-slash');
            password_eye_again.classList.add('fa-eye');
            password_eye_again.style.opacity = "1";
            password_eye_again.style.marginRight = "1vw";
        } else {
            passwordAgain.type = 'password';
            password_eye_again.classList.remove('fa-eye');
            password_eye_again.classList.add('fa-eye-slash');
            password_eye_again.style.opacity = "0";
            password_eye_again.style.marginRight = "0";
        }
    }

}

function VerificaTamanhoInput(){
    
    if(document.getElementById('emailRecuperaSenha') != null){
        let tamEmailResetSenha = document.getElementById('emailRecuperaSenha').value.length;
        if (tamEmailResetSenha < 30){
            $('.EmailResetSenhaInput').html(' ');
            $('.EmailResetSenhaInput').removeClass('text-warning');
            $('.EmailResetSenhaInput').removeClass('text-danger');
        }
        if (tamEmailResetSenha >= 30){
            $('.EmailResetSenhaInput').html( 50 - tamEmailResetSenha + '/50');
            $('.EmailResetSenhaInput').removeClass('text-danger');
            $('.EmailResetSenhaInput').addClass('text-warning');
        }
        if (tamEmailResetSenha > 40){
            $('.EmailResetSenhaInput').html( 50 - tamEmailResetSenha + '/50');
            $('.EmailResetSenhaInput').removeClass('text-warning');
            $('.EmailResetSenhaInput').addClass('text-danger');
        }
    }

    // tela recupera senha
    if(document.getElementById('novaSenhaUser') != null){
        let tamResetSenha = document.getElementById('novaSenhaUser').value.length;
        if (tamResetSenha < 15){
            $('.ResetSenhaInput').html(' ');
            $('.ResetSenhaInput').removeClass('text-warning');
            $('.ResetSenhaInput').removeClass('text-danger');
        }
        if (tamResetSenha >= 15){
            $('.ResetSenhaInput').html( 25 - tamResetSenha + '/25');
            $('.ResetSenhaInput').removeClass('text-danger');
            $('.ResetSenhaInput').addClass('text-warning');
        }
        if (tamResetSenha > 20){
            $('.ResetSenhaInput').html( 25 - tamResetSenha + '/25');
            $('.ResetSenhaInput').removeClass('text-warning');
            $('.ResetSenhaInput').addClass('text-danger');
        }
    }

    if(document.getElementById('repetNovaSenhaUser') != null){
        let tamResetSenha = document.getElementById('repetNovaSenhaUser').value.length;
        if (tamResetSenha < 15){
            $('.repetResetSenhaInput').html(' ');
            $('.repetResetSenhaInput').removeClass('text-warning');
            $('.repetResetSenhaInput').removeClass('text-danger');
        }
        if (tamResetSenha >= 15){
            $('.repetResetSenhaInput').html( 25 - tamResetSenha + '/25');
            $('.repetResetSenhaInput').removeClass('text-danger');
            $('.repetResetSenhaInput').addClass('text-warning');
        }
        if (tamResetSenha > 20){
            $('.repetResetSenhaInput').html( 25 - tamResetSenha + '/25');
            $('.repetResetSenhaInput').removeClass('text-warning');
            $('.repetResetSenhaInput').addClass('text-danger');
        }
    }

}

setInterval(VerificaTamanhoInput, 50);

function LimpaMsg(){
    if($('.msgRecupSenha') != null){
        $('.msgRecupSenha').css('bottom', '-12vw');
        setTimeout(() => { 
            $('.msgRecupSenha').text('');
            $('.msgRecupSenha').css('background', 'none');
        }, 1000);
    }

    // erro tela atualiza senha
    if($('.msgErro') != null){
        $('.msgErro').css('bottom', '-25vh');
        setTimeout(() => { 
            $('.msgErro').text('');
            $('.msgErro').css('background', 'none');
            $('.msgErro').remove();
        }, 1000);
    }

}

setInterval(LimpaMsg, 4000);