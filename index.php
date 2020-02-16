<?php

require_once 'DatabaseConnect.php';
require_once 'DbtableUser.php';

const DB_HOST = 'localhost';
const DB_NAME = 'mytestdb';
const DB_USER = 'root';
const DB_PASS = '';

$dbcon = new DatabaseConnect;
$dbh = $dbcon->pdoConnect (DB_HOST, DB_NAME, DB_USER, DB_PASS);

$tblUser = new DbtableUser($dbh);

try {
    $resIns = $tblUser->insert("Alice","Wonderland","alice.w@gmail.com");
    if ($resIns)
        echo ("Строка успешно добавлена!<br />");
} catch (PDOException $e) {
    echo ("Добавление строк. Ошибка ".$e);
}

try {
    $resUpd = $tblUser->update(2,"Alice","Zonderland","alice.z@gmail.com");
    if ($resUpd)
        echo ("Строка успешно обновлена!<br />");
} catch (PDOException $e) {
    echo ("Обновление строк. Ошибка ".$e);
}

try {
    $resSel = $tblUser->select(1);
    var_dump($resSel);
    echo("<br />");
    if ($resSel)
        echo ("Строки выведены успешно!<br />");
} catch (PDOException $e) {
    echo ("Выведение строк. Ошибка ".$e);
}

try {
    $resDel = $tblUser->delete(3);
    if ($resDel)
        echo ("Строка успешно удалена!<br />");
} catch (PDOException $e) {
    echo ("Удаление строк. Ошибка ".$e);
}
