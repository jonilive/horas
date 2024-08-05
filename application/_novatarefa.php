<?php
if (!defined('APP_NAME')) exit();

if ($_POST) {

    $operario = $_POST['operario'];
    $data = $_POST['data'];
    $horas = $_POST['horas'];
    $valor_hora = $_POST['valor_hora'];
    $tarefa = $_POST['tarefa'];

    new_tarefa($sql, $operario, $tarefa, $horas, $valor_hora, $data);
    header('Location: ./');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova tarefa - <?php echo APP_NAME; ?></title>

    <?php include '_includes.php'; ?>
</head>

<body>
    <?php include '_header.php'; ?>
    <main>
        <div class="container mt-5">

            <div id="form_bg">
                <h1>Nova tarefa</h1>
                <hr>

                <form action="./?action=novatarefa" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="operario" class="form-label">Operário</label>
                                <select name="operario" id="operario" class="form-select" required>
                                    <option value="">Selecione...</option>
                                    <?php
                                    foreach (get_operarios($sql) as $operario) {
                                        echo "<option value='$operario[nome]'>$operario[nome]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="datepicker" class="form-label">Data</label>
                                <input type="text" class="form-control" name="data" id="datepicker" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="horas" class="form-label">Horas</label>
                                <input type="number" class="form-control" name="horas" id="horas" step=".01" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="valor_hora" class="form-label">Valor / hora</label>
                                <input type="number" class="form-control" name="valor_hora" id="valor_hora" step=".01" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="tarefa" class="form-label">Tarefa</label>
                                <input type="text" class="form-control" name="tarefa" id="tarefa" autocomplete="off" required>
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