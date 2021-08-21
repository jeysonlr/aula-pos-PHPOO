<?php

declare(strict_types=1);

class Connection
{
    private $dsn = 'mysql:unix_socket=/var/run/mysqld/mysqld.sock;host=mysql;port=3306;dbname=api_base';
    private $username = 'root';
    private $password = 'root';
    private $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ); 
    public $connect = null;

    public function connect()
    {
        try {
            $this->connect = new PDO($this->dsn, $this->username, $this->password, $this->options);
            return $this->connect;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        } catch (Throwable $e) {
            throw $e;
        }
    }
}
