<?php
if (!defined('APP_NAME')) exit();

if ($_POST) {
    $nome = $_POST['nome'];

    new_operario($sql, $nome);
    header('Location: ./?action=operarios');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo operário - <?php echo APP_NAME; ?></title>

    <?php include '_includes.php'; ?>
</head>

<body>
    <?php include '_header.php'; ?>
    <main>
        <div class="container mt-5">

            <div id="form_bg">
                <h1>Novo operário</h1>
                <hr>

                <form action="./?action=novooperario" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" id="nome" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar alterações</button>
                </form>
            </div>
            <div class="footer"><a class="jnl" href="https://jonilive.com" target="_blank" title="Desenvolvido por Jonilive.com"></a></div>


        </div>
    </main>
</body>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5',
        locale: 'pt-br',
        format: 'yyyy-mm-dd',
        weekStartDay: 1
    });
</script>

</html>