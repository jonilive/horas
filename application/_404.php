<?php
if (!defined('APP_NAME')) exit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - <?php echo APP_NAME; ?></title>

    <?php include '_includes.php'; ?>
</head>

<body>
    <?php include '_header.php'; ?>
    <main>
        <div class="container mt-5">

            <div class="table-responsive" id="tabela_bg">
                <h1 class="text-center">404</h1>
                <p class="text-center">Página não encontrada</p>
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
                "width": "120px",
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