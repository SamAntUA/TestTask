<?php


class DbtableUser
{
    private const TABLE_NAME = "user";
    /**
     * @var PDO
     */
    private $dbh;

    function __construct($dbHandler)
    {
        $this->dbh = $dbHandler;
    }

    /**
     * @param string $name
     * @param string $lastName
     * @param string $email
     * @return PDOStatement|null
     */
    public function insert(string $name, string $lastName, string $email): ?PDOStatement
    {
        $query = sprintf(
            "INSERT INTO `%s`(`name`,`lastName`,`email`) VALUES ('%s','%s','%s');",
            self::TABLE_NAME,
            $name,
            $lastName,
            $email
        );
        return $this->dbh->query($query);
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $lastName
     * @param string $email
     * @return PDOStatement|null
     */
    public function update(int $id, string $name, string $lastName, string $email): ?PDOStatement
    {
        $query = sprintf(
            "UPDATE `%s` SET name='%s',lastName='%s',email='%s' WHERE `id`=%d;",
            self::TABLE_NAME,
            $name,
            $lastName,
            $email,
            $id
        );
        return $this->dbh->query($query);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function select(int $id): ?array
    {
        $query = sprintf(
            "SELECT * FROM `%s` WHERE `id`=%d;",
            self::TABLE_NAME,
            $id
        );
        return $this->dbh->query($query)->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     * @return PDOStatement|null
     */
    public function delete(int $id): ?PDOStatement
    {
        $query = sprintf(
            "DELETE FROM `%s` WHERE `id`=%d;",
            self::TABLE_NAME,
            $id
        );
        return $this->dbh->query($query);
    }
}
