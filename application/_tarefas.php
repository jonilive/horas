<?php
if (!defined('APP_NAME')) exit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APP_NAME; ?></title>

    <?php include '_includes.php'; ?>
</head>

<body>
    <?php include '_header.php'; ?>
    <main>
        <div class="container mt-5">

            <div class="table-responsive" id="tabela_bg">
                <div class="text-end">
                    <a class="btn btn-primary mx-3" title="Novo registo" href="./?action=novatarefa">Nova tarefa</a>
                </div>
                <table id="tabela" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Horas</th>
                            <th>Valor/h</th>
                            <th>Total</th>
                            <th>Operário</th>
                            <th>Tarefa</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (get_tarefas($sql) as $tarefa) {
                        ?>
                            <tr>
                                <td><?php echo $tarefa['data']; ?></td>
                                <td><?php echo $tarefa['horas']; ?> h</td>
                                <td><?php echo $tarefa['valor_hora']; ?>€</td>
                                <td><?php echo $tarefa['horas'] * $tarefa['valor_hora']; ?>€</td>
                                <td><?php echo $tarefa['nome']; ?></td>
                                <td><?php echo $tarefa['tarefa']; ?></td>
                                <td>
                                    <a class="btn btn-danger" href="./?action=apagartarefa&id=<?php echo $tarefa['id']; ?>" title="Apagar" onclick="return confirm('Tem a certeza que deseja apagar esta tarefa?')"><i class="fa-solid fa-trash"></i></a>
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
                "width": "120px",
                "targets": 0
            },
            {
                "width": "120px",
                "targets": 1
            },
            {
                "width": "120px",
                "type": "string",
                "targets": 2
            },
            {
                "width": "120px",
                "type": "string",
                "targets": 3
            },
            {
                "orderable": false,
                "width": "60px",
                "className": 'dt-center',
                "targets": 6
            },
        ],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.1.3/i18n/pt-PT.json'
        }
    });
</script>

</html>