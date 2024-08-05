<?php
if (!defined('APP_NAME')) exit();

$p_operario = $_POST['operario'] ?? null;
$p_mes = $_POST['mes'] ?? null;
$p_ano = $_POST['ano'] ?? null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular - <?php echo APP_NAME; ?></title>

    <?php include '_includes.php'; ?>
</head>

<body>
    <?php include '_header.php'; ?>
    <main>
        <div class="container mt-5">

            <div id="form_bg">
                <h1>Calcular totais</h1>
                <hr>

                <form action="./?action=calcular" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="login" class="form-label">Operário</label>
                                <select name="operario" id="operario" class="form-select" required>
                                    <option value="">Selecione...</option>
                                    <?php foreach (get_operarios($sql) as $operario) { ?>
                                        <option value="<?php echo $operario['nome'] ?>" <?php if ($operario['nome'] == $p_operario) echo 'selected'; ?>>
                                            <?php echo  $operario['nome'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="mes" class="form-label">Mês</label>
                                <select name="mes" id="mes" class="form-select" required>
                                    <option value="">Selecione...</option>
                                    <option value="01" <?php if ($p_mes == '01') echo 'selected'; ?>>Janeiro</option>
                                    <option value="02" <?php if ($p_mes == '02') echo 'selected'; ?>>Fevereiro</option>
                                    <option value="03" <?php if ($p_mes == '03') echo 'selected'; ?>>Março</option>
                                    <option value="04" <?php if ($p_mes == '04') echo 'selected'; ?>>Abril</option>
                                    <option value="05" <?php if ($p_mes == '05') echo 'selected'; ?>>Maio</option>
                                    <option value="06" <?php if ($p_mes == '06') echo 'selected'; ?>>Junho</option>
                                    <option value="07" <?php if ($p_mes == '07') echo 'selected'; ?>>Julho</option>
                                    <option value="08" <?php if ($p_mes == '08') echo 'selected'; ?>>Agosto</option>
                                    <option value="09" <?php if ($p_mes == '09') echo 'selected'; ?>>Setembro</option>
                                    <option value="10" <?php if ($p_mes == '10') echo 'selected'; ?>>Outubro</option>
                                    <option value="11" <?php if ($p_mes == '11') echo 'selected'; ?>>Novembro</option>
                                    <option value="12" <?php if ($p_mes == '12') echo 'selected'; ?>>Dezembro</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="ano" class="form-label">Ano</label>
                                <select name="ano" id="ano" class="form-select" required>
                                    <option value="">Selecione...</option>
                                    <?php for ($i = date('Y'); $i >= 2020; $i--) { ?>
                                        <option value="<?php echo  $i ?>" <?php if ($p_ano == $i) echo 'selected'; ?>><?php echo  $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Calcular total</button>
                </form>
                <?php
                if ($_POST) {
                    list($horas, $valor) = calculate($sql, $p_operario, $p_mes, $p_ano);
                    echo '<hr>';
                    echo '<h3>Horas: ' . $horas . 'h</h3>';
                    echo '<h3>Total: ' . $valor . '€</h3>';
                }
                ?>
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