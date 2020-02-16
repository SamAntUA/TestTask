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

$resIns = $tblUser->insert("Alice","Wonderland","alice.w@gmail.com");
if ($resIns)
    echo ("Строка успешно добавлена!<br />");

$resUpd = $tblUser->update(2,"Alice","Zonderland","alice.z@gmail.com");
if ($resUpd)
    echo ("Строка успешно обновлена!<br />");

$resSel = $tblUser->select(1);
var_dump($resSel);
if ($resSel)
    echo ("<br />Строки выведены успешно!<br />");

$resDel = $tblUser->delete(3);
if ($resDel)
    echo ("Строка успешно удалена!<br />");
