
function EditBanner(){
    $('#BannerEdit').click();
}

function carregarImgBanner() {
    var target = document.getElementById('targetBanner');
    var file = document.querySelector("#BannerEdit").files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        target.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
        document.querySelector('.BannerIcon').classList.add('imgBannerFull');
    } else {
        target.src = "../../assets/icones/bannerIcon.svg";
        document.querySelector('.BannerIcon').classList.remove('imgBannerFull');
    }
}

if(document.querySelector('#antigaSenha') != null){
    var passwordNew = document.getElementById("antigaSenha");
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

if(document.querySelector('#novaSenha') != null){
    var passwordAgain = document.getElementById("novaSenha");
    var password_eye_again = document.getElementById("password_toggle_new");
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

if(document.querySelector('#confirmaNovaSenha') != null){
    var passwordConfirm = document.getElementById("confirmaNovaSenha");
    var password_eye_confirm = document.getElementById("password_toggle_confirm");
    function passwordToggleConfirm() {
        if (passwordConfirm.type === 'password') {
            passwordConfirm.type = 'text';
            password_eye_confirm.classList.remove('fa-eye-slash');
            password_eye_confirm.classList.add('fa-eye');
            password_eye_confirm.style.opacity = "1";
            password_eye_confirm.style.marginRight = "1vw";
        } else {
            passwordConfirm.type = 'password';
            password_eye_confirm.classList.remove('fa-eye');
            password_eye_confirm.classList.add('fa-eye-slash');
            password_eye_confirm.style.opacity = "0";
            password_eye_confirm.style.marginRight = "0";
        }
    }

}

function VerificaTamanhoInput(){
    if(document.getElementById('nomeLink') != null){
        let tamNomeLink = document.getElementById('nomeLink').value.length;
        if (tamNomeLink < 25){
            $('.nomeLinkInput').html(' ');
            $('.nomeLinkInput').removeClass('text-warning');
            $('.nomeLinkInput').removeClass('text-danger');
        }
        if (tamNomeLink >= 25){
            $('.nomeLinkInput').html( 50 - tamNomeLink + '/50');
            $('.nomeLinkInput').removeClass('text-danger');
            $('.nomeLinkInput').addClass('text-warning');
        }
        if (tamNomeLink > 40){
            $('.nomeLinkInput').html( 50 - tamNomeLink + '/50');
            $('.nomeLinkInput').removeClass('text-warning');
            $('.nomeLinkInput').addClass('text-danger');
        }
    }

    if(document.getElementById('link') != null){
        let Link = document.getElementById('link').value.length;
        if (Link < 150){
            $('.linkInput').html(' ');
            $('.linkInput').removeClass('text-warning');
            $('.linkInput').removeClass('text-danger');
        }
        if (Link >= 150){
            $('.linkInput').html( 250 - Link + '/250');
            $('.linkInput').removeClass('text-danger');
            $('.linkInput').addClass('text-warning');
        }
        if (Link > 250){
            $('.linkInput').html( 250 - Link + '/250');
            $('.linkInput').removeClass('text-warning');
            $('.linkInput').addClass('text-danger');
        }
    }

    if(document.getElementById('nomeCompEdit') != null){
        let nomeInput = document.getElementById('nomeCompEdit').value.length;
        if (nomeInput < 60){
            $('.NomeCompEditInput').html(' ');
            $('.NomeCompEditInput').removeClass('text-warning');
            $('.NomeCompEditInput').removeClass('text-danger');
        }
        if (nomeInput >= 60){
            $('.NomeCompEditInput').html( 75 - nomeInput + '/75');
            $('.NomeCompEditInput').removeClass('text-danger');
            $('.NomeCompEditInput').addClass('text-warning');
        }
        if (nomeInput > 75){
            $('.NomeCompEditInput').html( 75 - nomeInput + '/75');
            $('.NomeCompEditInput').removeClass('text-warning');
            $('.NomeCompEditInput').addClass('text-danger');
        }
    }

    if(document.getElementById('antigoEmail') != null){
        let emailAntig = document.getElementById('antigoEmail').value.length;
        if (emailAntig < 35){
            $('.emailAntigoEditInput').html(' ');
            $('.emailAntigoEditInput').removeClass('text-warning');
            $('.emailAntigoEditInput').removeClass('text-danger');
        }
        if (emailAntig >= 35){
            $('.emailAntigoEditInput').html( 50 - emailAntig + '/50');
            $('.emailAntigoEditInput').removeClass('text-danger');
            $('.emailAntigoEditInput').addClass('text-warning');
        }
        if (emailAntig > 50){
            $('.emailAntigoEditInput').html( 50 - emailAntig + '/50');
            $('.emailAntigoEditInput').removeClass('text-warning');
            $('.emailAntigoEditInput').addClass('text-danger');
        }
    }

    if(document.getElementById('novoEmail') != null){
        let novEmail = document.getElementById('novoEmail').value.length;
        if (novEmail < 35){
            $('.novoEmailEditInput').html(' ');
            $('.novoEmailEditInput').removeClass('text-warning');
            $('.novoEmailEditInput').removeClass('text-danger');
        }
        if (novEmail >= 35){
            $('.novoEmailEditInput').html( 50 - novEmail + '/50');
            $('.novoEmailEditInput').removeClass('text-danger');
            $('.novoEmailEditInput').addClass('text-warning');
        }
        if (novEmail > 50){
            $('.novoEmailEditInput').html( 50 - novEmail + '/50');
            $('.novoEmailEditInput').removeClass('text-warning');
            $('.novoEmailEditInput').addClass('text-danger');
        }
    }

    if(document.getElementById('confirmaNovoEmail') != null){
        let confirNovoEmail = document.getElementById('confirmaNovoEmail').value.length;
        if (confirNovoEmail < 35){
            $('.ConfirmaNovoEmailEditInput').html(' ');
            $('.ConfirmaNovoEmailEditInput').removeClass('text-warning');
            $('.ConfirmaNovoEmailEditInput').removeClass('text-danger');
        }
        if (confirNovoEmail >= 35){
            $('.ConfirmaNovoEmailEditInput').html( 50 - confirNovoEmail + '/50');
            $('.ConfirmaNovoEmailEditInput').removeClass('text-danger');
            $('.ConfirmaNovoEmailEditInput').addClass('text-warning');
        }
        if (confirNovoEmail > 50){
            $('.ConfirmaNovoEmailEditInput').html( 50 - confirNovoEmail + '/50');
            $('.ConfirmaNovoEmailEditInput').removeClass('text-warning');
            $('.ConfirmaNovoEmailEditInput').addClass('text-danger');
        }
    }

    if(document.getElementById('antigaSenha') != null){
        let oldPassw = document.getElementById('antigaSenha').value.length;
        if (oldPassw < 15){
            $('.SenhaAntigaEditInput').html(' ');
            $('.SenhaAntigaEditInput').removeClass('text-warning');
            $('.SenhaAntigaEditInput').removeClass('text-danger');
        }
        if (oldPassw >= 15){
            $('.SenhaAntigaEditInput').html( 25 - oldPassw + '/25');
            $('.SenhaAntigaEditInput').removeClass('text-danger');
            $('.SenhaAntigaEditInput').addClass('text-warning');
        }
        if (oldPassw > 25){
            $('.SenhaAntigaEditInput').html( 25 - oldPassw + '/25');
            $('.SenhaAntigaEditInput').removeClass('text-warning');
            $('.SenhaAntigaEditInput').addClass('text-danger');
        }
    }

    if(document.getElementById('novaSenha') != null){
        let newPassw = document.getElementById('novaSenha').value.length;
        if (newPassw < 15){
            $('.NovaSenhaEditInput').html(' ');
            $('.NovaSenhaEditInput').removeClass('text-warning');
            $('.NovaSenhaEditInput').removeClass('text-danger');
        }
        if (newPassw >= 15){
            $('.NovaSenhaEditInput').html( 25 - newPassw + '/25');
            $('.NovaSenhaEditInput').removeClass('text-danger');
            $('.NovaSenhaEditInput').addClass('text-warning');
        }
        if (newPassw > 25){
            $('.NovaSenhaEditInput').html( 25 - newPassw + '/25');
            $('.NovaSenhaEditInput').removeClass('text-warning');
            $('.NovaSenhaEditInput').addClass('text-danger');
        }
    }

    if(document.getElementById('confirmaNovaSenha') != null){
        let confirmNewPassw = document.getElementById('confirmaNovaSenha').value.length;
        if (confirmNewPassw < 15){
            $('.ConfirmaNovaSenhaEditInput').html(' ');
            $('.ConfirmaNovaSenhaEditInput').removeClass('text-warning');
            $('.ConfirmaNovaSenhaEditInput').removeClass('text-danger');
        }
        if (confirmNewPassw >= 15){
            $('.ConfirmaNovaSenhaEditInput').html( 25 - confirmNewPassw + '/25');
            $('.ConfirmaNovaSenhaEditInput').removeClass('text-danger');
            $('.ConfirmaNovaSenhaEditInput').addClass('text-warning');
        }
        if (confirmNewPassw > 25){
            $('.ConfirmaNovaSenhaEditInput').html( 25 - confirmNewPassw + '/25');
            $('.ConfirmaNovaSenhaEditInput').removeClass('text-warning');
            $('.ConfirmaNovaSenhaEditInput').addClass('text-danger');
        }
    }

}
setInterval(VerificaTamanhoInput, 50);

function resetIndex() {
    window.location='./index.php';
}

//upload infos modal edit user
$(document).ready(function () {
    $('#telefoneContatoEdit').mask('(00) 00000 - 0000');

    $("#FormDados").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "insert.php",
            type: 'POST',
            data: formData,
            success: function (mensagem) {
                $('.msgErros').removeClass('text-danger');
                $('.msgErros').addClass('text-warning');
                $('.msgErros').text('carregando...');
                if (mensagem.trim() === "Salvo com Sucesso!!") {
                    $('.msgErros').removeClass('text-warning');
                    $('.msgErros').removeClass('text-danger');
                    $('.msgErros').addClass('text-success');
                    $('.msgErros').text(mensagem);
                    setTimeout(() => { 
                        $('.CloseBtn').click();
                        window.location='./index.php';
                    }, 1500);
                }
                else {
                    $('.msgErros').removeClass('text-warning');
                    $('.msgErros').addClass('text-danger');
                    $('.msgErros').text(mensagem);
                }
            },
            cache: false,
            contentType: false,
            processData: false,
            xhr: function () {  // Custom XMLHttpRequest
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
                    myXhr.upload.addEventListener('progress', function () {
                        /* faz alguma coisa durante o progresso do upload */
                    }, false);
                }
                return myXhr;
            }
        });
    });

    $('#DeletLinkbtn').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "excluirLink.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function (mensagem) {
                if (mensagem.trim() === "Excluído com Sucesso!!") {
                    $('.msgErrosDelet').removeClass('text-warning');
                    $('.msgErrosDelet').removeClass('text-danger');
                    $('.msgErrosDelet').addClass('text-success');
                    $('.msgErrosDelet').text(mensagem);
                    setTimeout(() => { 
                        $('.CloseBtn').click();
                        window.location='./index.php';
                    }, 1500);
                }
                else{
                    $('.msgErrosDelet').removeClass('text-success');
                    $('.msgErrosDelet').removeClass('text-warning');
                    $('.msgErrosDelet').addClass('text-danger');
                    $('#msgErrosDelet').text(mensagem)
                }
            }
        })
    })

    $('#formEditUser').submit(function(event){
        event.preventDefault();
        $.ajax({
            url:"EditCadastro.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                $('#msgErros').removeClass('text-danger');
                $('#msgErros').addClass('text-warning');
                $('#msgErros').text('carregando..');
                if(msg.trim() === 'Cadastro alterado com Sucesso!!'){
                    $('#msgErros').removeClass('text-danger');
                    $('#msgErros').removeClass('text-warning');
                    $('#msgErros').addClass('text-success');
                    $('#msgErros').text(msg);
                    setTimeout(() => { 
                        location.reload();
                    }, 4000);
                }
                else{
                    $('#msgErros').removeClass('text-warning');
                    $('#msgErros').addClass('text-danger');
                    $('#msgErros').text(msg);
                }
            }
        })
    });

    $('#formEditEmailUser').submit(function(event){
        event.preventDefault();
        $.ajax({
            url:"EditEmail.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                $('#msgErros').removeClass('text-danger');
                $('#msgErros').addClass('text-warning');
                $('#msgErros').text('carregando..');
                if(msg.trim() === 'E-mail alterado com Sucesso!'){
                    $('#msgErros').removeClass('text-danger');
                    $('#msgErros').removeClass('text-warning');
                    $('#msgErros').addClass('text-success');
                    $('#msgErros').text(msg);
                    setTimeout(() => { 
                        $('#msgErros').text('Necessario relogar para alteração completa do email');
                        setTimeout(() => { 
                            window.location='../logout.php';
                        }, 5000);
                    }, 2000);
                }
                else{
                    $('#msgErros').removeClass('text-warning');
                    $('#msgErros').addClass('text-danger');
                    $('#msgErros').text(msg);
                }
            }
        })
    });

    $('#formEditSenhaUser').submit(function(event){
        event.preventDefault();
        $.ajax({
            url:"EditSenha.php",
            method:"post",
            data: $('form').serialize(),
            dataType: "text",
            success: function(msg){
                $('#msgErros').removeClass('text-danger');
                $('#msgErros').addClass('text-warning');
                $('#msgErros').text('carregando..');
                if(msg.trim() === 'Senha alterada com Sucesso!'){
                    $('#msgErros').removeClass('text-danger');
                    $('#msgErros').removeClass('text-warning');
                    $('#msgErros').addClass('text-success');
                    $('#msgErros').text(msg);
                    setTimeout(() => { 
                        location.reload();
                    }, 5000);
                }
                else{
                    $('#msgErros').removeClass('text-warning');
                    $('#msgErros').addClass('text-danger');
                    $('#msgErros').text(msg);
                }
            }
        });
    });

});