<?php


class DatabaseConnect
{
    public function pdoConnect($dbHost, $dbName, $dbUser, $dbPass)
    {
        $dsn = 'mysql:host='.$dbHost.';dbname='.$dbName;
        $dbHandler = new PDO($dsn, $dbUser, $dbPass);
        return $dbHandler;
    }
}
