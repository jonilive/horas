<?php
if (!defined('APP_NAME')) exit();

$id = $_GET['id'];

delete_operario($sql, $id);
header('Location: ./?action=operarios');
