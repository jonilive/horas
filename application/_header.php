<?php
if (!defined('APP_NAME')) exit();
?>
<header class="p-3 bg-dark text-white main-header">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="./" class="nav-link px-2 text-white">Tarefas</a></li>
                <li><a href="./?action=operarios" class="nav-link px-2 text-white">Operários</a></li>
                <li><a href="./?action=calcular" class="nav-link px-2 text-white">Calcular</a></li>
            </ul>

            <div class="text-end">
                <button type="button" class="btn btn-danger" onclick="confirm('Tem a certeza que deseja sair?') ? window.location.href = './?action=sair' : false">Sair</button>
            </div>
        </div>
    </div>
</header>