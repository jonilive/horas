<?php
if (!defined('APP_NAME')) exit();

$id = $_GET['id'];

delete_tarefa($sql, $id);
header('Location: ./');
