<?php


class DatabaseConnect
{
    /**
     * @param string $dbHost
     * @param string $dbName
     * @param string $dbUser
     * @param string $dbPass
     * @return PDO
     */
    public function pdoConnect(string $dbHost, string $dbName, string $dbUser, string $dbPass): PDO
    {
        $dsn = sprintf(
            "mysql:host=%s;dbname=%s",
        $dbHost,
        $dbName
        );
        $dbHandler = new PDO($dsn, $dbUser, $dbPass);
        return $dbHandler;
    }
}
