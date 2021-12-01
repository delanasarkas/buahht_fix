<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/assets/images/logo/logo.png">
    <title>LOGIN | SISTEM ABSENSI RSIA BUAH HATI PAMULANG</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/login/style.css">
</head>
<body>  
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card p-3 card-center shadow-lg">
                    <img src="/assets/images/logo/logo.png" alt="logo" width="150" class="login-logo">
                    <div class="card-body mt-5">
                        <?= $this->renderSection('content') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>
    <script src="/assets/vendor/fontawesome/fontawesome.js"></script>

    <script>
        const inputValidation = (event) => {
            let value = event.target.value;
            let field = $(`#${event.target.id}`);

            if(value.length > 0){
                field.removeClass( "is-invalid" ).addClass( "is-valid" );
            } else {
                field.removeClass( "is-valid" ).addClass( "is-invalid" );
            }
        }

        const buttonValid = () => {
            let username = $('#username').val();
            let password = $('#password').val();
            let button = $('#btn-login');

            if(username.length > 0 && password.length > 0){
                button.prop('disabled', false);
            } else {
                button.prop('disabled', true);
            }
        }

        const buttonLoader = () => {
            let button = $('#btn-login');
            let buttonLoader = $('#btn-loader');

            button.addClass( "d-none" );
            buttonLoader.removeClass( "d-none" );
        }

        const seePassword = () => {
            let passwordField = $('#password');
            let passwordIcon = $('#eye-icon');

            if(passwordField.attr('type') === 'password') {
                passwordField.prop("type", "text");
                passwordIcon.removeClass( "far fa-eye" ).addClass( "far fa-eye-slash" );
            } else {
                passwordField.prop("type", "password");
                passwordIcon.removeClass( "far fa-eye-slash" ).addClass( "far fa-eye" );
            }
        }
    </script>
</body>
</html>