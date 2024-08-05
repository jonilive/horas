<?php
if (!defined('APP_NAME')) exit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operários - <?php echo APP_NAME; ?></title>

    <?php include '_includes.php'; ?>
</head>

<body>
    <?php include '_header.php'; ?>
    <main>
        <div class="container mt-5">

            <div class="table-responsive" id="tabela_bg">
                <div class="text-end">
                    <a class="btn btn-primary mx-3" title="Novo registo" href="./?action=novooperario">Novo operário</a>
                </div>
                <table id="tabela" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (get_operarios($sql) as $operario) {
                        ?>
                            <tr>
                                <td><?php echo $operario['nome']; ?></td>
                                <td>
                                    <a class="btn btn-danger" href="./?action=apagaroperario&id=<?php echo $operario['id']; ?>" title="Apagar" onclick="return confirm('Tem a certeza que deseja apagar este operário?')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="footer"><a class="jnl" href="https://jonilive.com" target="_blank" title="Desenvolvido por Jonilive.com"></a></div>


        </div>
    </main>
</body>

<script>
    new DataTable('#tabela', {
        "order": [
            [2, 'desc']
        ],
        columnDefs: [{
            "orderable": false,
            "width": "60px",
            "className": 'dt-center',
            "targets": 1
        }, ],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/pt-PT.json'
        }
    });
</script>

</html>