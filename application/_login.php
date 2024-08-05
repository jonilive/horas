<?php
if (!defined('APP_NAME')) exit();

if ($_POST) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];

    header('Location: ./');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sessão - <?php echo APP_NAME; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="" method="POST">
            <img class="mb-4" src="assets/logo.png" alt="" width="72" height="72">
            <h1 class="h3 fw-normal"><?php echo APP_NAME; ?></h1>

            <?php
            if (isset($_SESSION['login']) and isset($_SESSION['password'])) {
                if (!empty($_SESSION['login'])  or  !empty($_SESSION['password'])) {
                    echo '<span class="text-danger">Utilizador ou palavra-passe incorretos</span>';
                }
            }
            ?>

            <div class="form-floating mt-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="Utilizador" name="login" autofocus>
                <label for="floatingInput">Utilizador</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Palavra-passe">
                <label for="floatingPassword">Palavra-passe</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sessão</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
        </form>
    </main>



</body>

</html>