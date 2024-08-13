<?php
namespace Admin\PhpTests;

use PDO;
use PDOStatement;
use PHPUnit\Framework\TestCase;
use Admin\PhpTests\UserDAO;

class UserDAOTest extends TestCase {
    private $pdo;
    private $userDAO;

    protected function setUp(): void {
        $this->pdo = $this->createMock(PDO::class);
        $this->userDAO = new UserDAO($this->pdo);
    }

    public function testCreateUser() {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())
             ->method('execute')
             ->with(['name' => 'John Doe', 'email' => 'john@example.com']);
        
        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->willReturn($stmt);

        $this->pdo->expects($this->once())
                  ->method('lastInsertId')
                  ->willReturn('1');

        $userId = $this->userDAO->createUser('John Doe', 'john@example.com');
        $this->assertEquals('1', $userId);
    }

    public function testGetUserById() {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())
             ->method('execute')
             ->with(['id' => 1]);
        $stmt->expects($this->once())
             ->method('fetch')
             ->willReturn(['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com']);

        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->willReturn($stmt);

        $user = $this->userDAO->getUserById(1);
        $this->assertEquals(['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'], $user);
    }

    public function testUpdateUser() {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())
             ->method('execute')
             ->with(['id' => 1, 'name' => 'Jane Doe', 'email' => 'jane@example.com'])
             ->willReturn(true);

        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->willReturn($stmt);

        $result = $this->userDAO->updateUser(1, 'Jane Doe', 'jane@example.com');
        $this->assertTrue($result);
    }

    public function testDeleteUser() {
        $stmt = $this->createMock(PDOStatement::class);
        $stmt->expects($this->once())
             ->method('execute')
             ->with(['id' => 1])
             ->willReturn(true);

        $this->pdo->expects($this->once())
                  ->method('prepare')
                  ->willReturn($stmt);

        $result = $this->userDAO->deleteUser(1);
        $this->assertTrue($result);
    }
}
