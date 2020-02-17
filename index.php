<?php

require_once 'DbtableUser.php';

const DB_HOST = 'localhost';
const DB_NAME = 'mytestdb';
const DB_USER = 'root';
const DB_PASS = '';

$dsn = sprintf(
    "mysql:host=%s;dbname=%s",
    DB_HOST,
    DB_NAME
);
$dbh = new PDO($dsn, DB_USER, DB_PASS);
$tblUser = new DbtableUser($dbh);

$resIns = $tblUser->insert("Alice","Wonderland","alice.w@gmail.com");

$resUpd = $tblUser->update(2,"Alice","Zonderland","alice.z@gmail.com");

$resSel = $tblUser->select(1);
var_dump($resSel);

$resDel = $tblUser->delete(3);

