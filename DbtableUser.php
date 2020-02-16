<?php


class DbtableUser
{
    private $tableName = "user";
    /**
     * @var PDO
     */
    private $dbh;

    function __construct($dbHandler)
    {
        $this->dbh = $dbHandler;
    }
    public function insert($name, $lastName, $email)
    {
        $query = sprintf(
            "INSERT INTO `%s`(`name`,`lastName`,`email`) VALUES ('%s','%s','%s');",
            $this->tableName,
            $name,
            $lastName,
            $email
        );
        return $this->dbh->query($query);
    }
    public function update($id, $name, $lastName, $email)
    {
        $query = sprintf(
            "UPDATE `%s` SET name='%s',lastName='%s',email='%s' WHERE `id`=%d;",
            $this->tableName,
            $name,
            $lastName,
            $email,
            $id
        );
        return $this->dbh->query($query);
    }
    public function select($id)
    {
        $query = sprintf(
            "SELECT * FROM `%s` WHERE `id`=%d;",
            $this->tableName,
            $id
        );
        return $this->dbh->query($query)->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($id)
    {
        $query = sprintf(
            "DELETE FROM `%s` WHERE `id`=%d;",
            $this->tableName,
            $id
        );
        return $this->dbh->query($query);
    }
}
