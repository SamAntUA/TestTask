<?php

require_once ('../DbtableUser.php');
require_once ('../DatabaseConnect.php');

use PHPUnit\Framework\TestCase;

class DbtableUserTest extends TestCase
{
    /**
     * @var DbtableUser
     */
    private $tblUser;
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject
     */
    private $pdoMock;

    public function setUp(): void
    {
        $this->pdoMock = $this->createMock(PDO::class);
        $this->tblUser = new DbtableUser($this->pdoMock);
    }

    /**
     * @param string $name
     * @param string $lastName
     * @param string $email
     * @param string $sql
     * @dataProvider additionProviderForInsert
     */
    public function testInsert($name, $lastName, $email, $sql)
    {
        $this->pdoMock
            ->expects($this->once())
            ->method('query')
            ->with($sql);
        $this->tblUser->insert($name, $lastName, $email);
    }

    public function additionProviderForInsert(): array
    {
        return [
            'insert sql'  => ["Alice", "Wonderland", "alice.w@gmail.com", "INSERT INTO `user`(`name`,`lastName`,`email`) VALUES ('Alice','Wonderland','alice.w@gmail.com');"]
        ];
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $lastName
     * @param string $email
     * @param string $sql
     * @dataProvider additionProviderForUpdate()
     */
    public function testUpdate($id, $name, $lastName, $email, $sql)
    {
        $this->pdoMock
            ->expects($this->once())
            ->method('query')
            ->with($sql);
        $this->tblUser->update($id, $name, $lastName, $email);
    }

    public function additionProviderForUpdate(): array
    {
        return [
            'update sql'  => [2, "Alice", "Zonderland", "alice.z@gmail.com", "UPDATE `user` SET name='Alice',lastName='Zonderland',email='alice.z@gmail.com' WHERE `id`=2;"]
        ];
    }

    /**
     * @param int $id
     * @param string $sql
     * @param PDOStatement $pdoStatementMock
     * @param array $expectedFetchResult
     * @dataProvider additionProviderForSelect
     */
    public function testSelect($id, $sql, $pdoStatementMock, $expectedFetchResult)
    {
        $this->pdoMock
            ->expects($this->once())
            ->method('query')
            ->with($sql)
            ->willReturn($pdoStatementMock);
        $actual = $this->tblUser->select($id);
        $this->assertSame($expectedFetchResult, $actual);
    }

    public function additionProviderForSelect(): array
    {
        $pdoStatementMock = $this->createMock(PDOStatement::class);
        $expectedFetchResult = [1,'name','lastname','email','2020-02-02 20:20:20'];
        $pdoStatementMock
            ->expects($this->once())
            ->method('fetch')
            ->with(PDO::FETCH_ASSOC)
            ->willReturn($expectedFetchResult);
        return [
            'select sql'  => [2, "SELECT * FROM `user` WHERE `id`=2;", $pdoStatementMock, $expectedFetchResult]
        ];
    }

    /**
     * @param int $id
     * @param string $sql
     * @dataProvider additionProviderForDelete
     */
    public function testDelete($id, $sql)
    {
        $this->pdoMock
            ->expects($this->once())
            ->method('query')
            ->with($sql);
        $this->tblUser->delete($id);
    }

    public function additionProviderForDelete(): array
    {
        return [
            'delete sql'  => [3, "DELETE FROM `user` WHERE `id`=3;"]
        ];
    }
}