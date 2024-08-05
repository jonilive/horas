<?php
if (!defined('APP_NAME')) exit();

$sql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($sql->connect_errno) {
    die("Failed to connect to MySQL: (" . $sql->connect_errno . ") " . $sql->connect_error);
}

if ($sql->query('SHOW TABLES LIKE "operarios"')->num_rows == 0) {
    $sql->query('CREATE TABLE `operarios` (`id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`nome`)) ENGINE = InnoDB');
}

if ($sql->query('SHOW TABLES LIKE "tarefas"')->num_rows == 0) {
    $sql->query('CREATE TABLE `tarefas` (`id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(255) NOT NULL , `tarefa` VARCHAR(255) NOT NULL , `horas` DECIMAL(10,2) NOT NULL , `valor_hora` DECIMAL(10,2) NOT NULL , `data` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB');
}

function get_tarefas($sql)
{
    $result = $sql->query('SELECT * FROM `tarefas` ORDER BY `data` DESC');

    return $result->fetch_all(MYSQLI_ASSOC);
}

function new_tarefa($sql, $nome, $tarefa, $horas, $valor_hora, $data)
{
    $sql = $sql->prepare('INSERT INTO `tarefas` (`nome`, `tarefa`, `horas`, `valor_hora`, `data`) VALUES (?, ?, ?, ?, ?)');
    $sql->bind_param('ssdds', $nome, $tarefa, $horas, $valor_hora, $data);
    $sql->execute();

    return $sql->insert_id;
}

function delete_tarefa($sql, $id)
{
    $sql->query('DELETE FROM `tarefas` WHERE `id` = ' . $id);

    return $sql->affected_rows;
}

function get_operarios($sql)
{
    $result = $sql->query('SELECT * FROM `operarios` ORDER BY `nome` ASC');

    return $result->fetch_all(MYSQLI_ASSOC);
}

function new_operario($sql, $nome)
{
    $sql = $sql->prepare('INSERT INTO `operarios` (`nome`) VALUES (?)');
    $sql->bind_param('s', $nome);
    $sql->execute();

    return $sql->insert_id;
}

function delete_operario($sql, $id)
{
    $sql->query('DELETE FROM `operarios` WHERE `id` = ' . $id);

    return $sql->affected_rows;
}

function calculate($sql, $nome, $mes, $ano)
{
    $sql = $sql->prepare('SELECT * FROM `tarefas` WHERE MONTH(`data`) = (?) AND YEAR(`data`) = (?) AND `nome` = (?)');
    $sql->bind_param('sss', $mes, $ano, $nome);
    $sql->execute();
    $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

    $calculated = [
        0,
        0
    ];

    foreach ($result as $tarefa) {
        $calculated[0] += $tarefa['horas'];
        $calculated[1] += $tarefa['horas'] * $tarefa['valor_hora'];
    }


    return $calculated;
}
